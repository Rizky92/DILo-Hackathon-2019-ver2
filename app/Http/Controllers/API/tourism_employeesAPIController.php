<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createtourism_employeesAPIRequest;
use App\Http\Requests\API\Updatetourism_employeesAPIRequest;
use App\Models\tourism_employees;
use App\Repositories\tourism_employeesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class tourism_employeesController
 * @package App\Http\Controllers\API
 */

class tourism_employeesAPIController extends AppBaseController
{
    /** @var  tourism_employeesRepository */
    private $tourismEmployeesRepository;

    public function __construct(tourism_employeesRepository $tourismEmployeesRepo)
    {
        $this->tourismEmployeesRepository = $tourismEmployeesRepo;
    }

    /**
     * Display a listing of the tourism_employees.
     * GET|HEAD /tourismEmployees
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tourismEmployees = $this->tourismEmployeesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tourismEmployees->toArray(), 'Tourism Employees retrieved successfully');
    }

    /**
     * Store a newly created tourism_employees in storage.
     * POST /tourismEmployees
     *
     * @param Createtourism_employeesAPIRequest $request
     *
     * @return Response
     */
    public function store(Createtourism_employeesAPIRequest $request)
    {
        $input = $request->all();

        $tourismEmployees = $this->tourismEmployeesRepository->create($input);

        return $this->sendResponse($tourismEmployees->toArray(), 'Tourism Employees saved successfully');
    }

    /**
     * Display the specified tourism_employees.
     * GET|HEAD /tourismEmployees/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var tourism_employees $tourismEmployees */
        $tourismEmployees = $this->tourismEmployeesRepository->find($id);

        if (empty($tourismEmployees)) {
            return $this->sendError('Tourism Employees not found');
        }

        return $this->sendResponse($tourismEmployees->toArray(), 'Tourism Employees retrieved successfully');
    }

    /**
     * Update the specified tourism_employees in storage.
     * PUT/PATCH /tourismEmployees/{id}
     *
     * @param int $id
     * @param Updatetourism_employeesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetourism_employeesAPIRequest $request)
    {
        $input = $request->all();

        /** @var tourism_employees $tourismEmployees */
        $tourismEmployees = $this->tourismEmployeesRepository->find($id);

        if (empty($tourismEmployees)) {
            return $this->sendError('Tourism Employees not found');
        }

        $tourismEmployees = $this->tourismEmployeesRepository->update($input, $id);

        return $this->sendResponse($tourismEmployees->toArray(), 'tourism_employees updated successfully');
    }

    /**
     * Remove the specified tourism_employees from storage.
     * DELETE /tourismEmployees/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var tourism_employees $tourismEmployees */
        $tourismEmployees = $this->tourismEmployeesRepository->find($id);

        if (empty($tourismEmployees)) {
            return $this->sendError('Tourism Employees not found');
        }

        $tourismEmployees->delete();

        return $this->sendResponse($id, 'Tourism Employees deleted successfully');
    }
}
