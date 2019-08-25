<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createtourism_employeesRequest;
use App\Http\Requests\Updatetourism_employeesRequest;
use App\Repositories\tourism_employeesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tourism_employeesController extends AppBaseController
{
    /** @var  tourism_employeesRepository */
    private $tourismEmployeesRepository;

    public function __construct(tourism_employeesRepository $tourismEmployeesRepo)
    {
        $this->tourismEmployeesRepository = $tourismEmployeesRepo;
    }

    /**
     * Display a listing of the tourism_employees.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tourismEmployees = $this->tourismEmployeesRepository->all();

        return view('tourism_employees.index')
            ->with('tourismEmployees', $tourismEmployees);
    }

    /**
     * Show the form for creating a new tourism_employees.
     *
     * @return Response
     */
    public function create()
    {
        return view('tourism_employees.create');
    }

    /**
     * Store a newly created tourism_employees in storage.
     *
     * @param Createtourism_employeesRequest $request
     *
     * @return Response
     */
    public function store(Createtourism_employeesRequest $request)
    {
        $input = $request->all();

        $tourismEmployees = $this->tourismEmployeesRepository->create($input);

        Flash::success('Tourism Employees saved successfully.');

        return redirect(route('tourismEmployees.index'));
    }

    /**
     * Display the specified tourism_employees.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tourismEmployees = $this->tourismEmployeesRepository->find($id);

        if (empty($tourismEmployees)) {
            Flash::error('Tourism Employees not found');

            return redirect(route('tourismEmployees.index'));
        }

        return view('tourism_employees.show')->with('tourismEmployees', $tourismEmployees);
    }

    /**
     * Show the form for editing the specified tourism_employees.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tourismEmployees = $this->tourismEmployeesRepository->find($id);

        if (empty($tourismEmployees)) {
            Flash::error('Tourism Employees not found');

            return redirect(route('tourismEmployees.index'));
        }

        return view('tourism_employees.edit')->with('tourismEmployees', $tourismEmployees);
    }

    /**
     * Update the specified tourism_employees in storage.
     *
     * @param int $id
     * @param Updatetourism_employeesRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetourism_employeesRequest $request)
    {
        $tourismEmployees = $this->tourismEmployeesRepository->find($id);

        if (empty($tourismEmployees)) {
            Flash::error('Tourism Employees not found');

            return redirect(route('tourismEmployees.index'));
        }

        $tourismEmployees = $this->tourismEmployeesRepository->update($request->all(), $id);

        Flash::success('Tourism Employees updated successfully.');

        return redirect(route('tourismEmployees.index'));
    }

    /**
     * Remove the specified tourism_employees from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tourismEmployees = $this->tourismEmployeesRepository->find($id);

        if (empty($tourismEmployees)) {
            Flash::error('Tourism Employees not found');

            return redirect(route('tourismEmployees.index'));
        }

        $this->tourismEmployeesRepository->delete($id);

        Flash::success('Tourism Employees deleted successfully.');

        return redirect(route('tourismEmployees.index'));
    }
}
