<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatemissionsRequest;
use App\Http\Requests\UpdatemissionsRequest;
use App\Repositories\missionsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class missionsController extends AppBaseController
{
    /** @var  missionsRepository */
    private $missionsRepository;

    public function __construct(missionsRepository $missionsRepo)
    {
        $this->missionsRepository = $missionsRepo;
    }

    /**
     * Display a listing of the missions.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $missions = $this->missionsRepository->all();

        return view('missions.index')
            ->with('missions', $missions);
    }

    /**
     * Show the form for creating a new missions.
     *
     * @return Response
     */
    public function create()
    {
        return view('missions.create');
    }

    /**
     * Store a newly created missions in storage.
     *
     * @param CreatemissionsRequest $request
     *
     * @return Response
     */
    public function store(CreatemissionsRequest $request)
    {
        $input = $request->all();

        $missions = $this->missionsRepository->create($input);

        Flash::success('Missions saved successfully.');

        return redirect(route('missions.index'));
    }

    /**
     * Display the specified missions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $missions = $this->missionsRepository->find($id);

        if (empty($missions)) {
            Flash::error('Missions not found');

            return redirect(route('missions.index'));
        }

        return view('missions.show')->with('missions', $missions);
    }

    /**
     * Show the form for editing the specified missions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $missions = $this->missionsRepository->find($id);

        if (empty($missions)) {
            Flash::error('Missions not found');

            return redirect(route('missions.index'));
        }

        return view('missions.edit')->with('missions', $missions);
    }

    /**
     * Update the specified missions in storage.
     *
     * @param int $id
     * @param UpdatemissionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemissionsRequest $request)
    {
        $missions = $this->missionsRepository->find($id);

        if (empty($missions)) {
            Flash::error('Missions not found');

            return redirect(route('missions.index'));
        }

        $missions = $this->missionsRepository->update($request->all(), $id);

        Flash::success('Missions updated successfully.');

        return redirect(route('missions.index'));
    }

    /**
     * Remove the specified missions from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $missions = $this->missionsRepository->find($id);

        if (empty($missions)) {
            Flash::error('Missions not found');

            return redirect(route('missions.index'));
        }

        $this->missionsRepository->delete($id);

        Flash::success('Missions deleted successfully.');

        return redirect(route('missions.index'));
    }
}
