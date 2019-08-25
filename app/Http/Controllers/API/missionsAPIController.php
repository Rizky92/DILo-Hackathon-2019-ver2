<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatemissionsAPIRequest;
use App\Http\Requests\API\UpdatemissionsAPIRequest;
use App\Models\missions;
use App\Repositories\missionsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class missionsController
 * @package App\Http\Controllers\API
 */

class missionsAPIController extends AppBaseController
{
    /** @var  missionsRepository */
    private $missionsRepository;

    public function __construct(missionsRepository $missionsRepo)
    {
        $this->missionsRepository = $missionsRepo;
    }

    /**
     * Display a listing of the missions.
     * GET|HEAD /missions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $missions = $this->missionsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($missions->toArray(), 'Missions retrieved successfully');
    }

    /**
     * Store a newly created missions in storage.
     * POST /missions
     *
     * @param CreatemissionsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatemissionsAPIRequest $request)
    {
        $input = $request->all();

        $missions = $this->missionsRepository->create($input);

        return $this->sendResponse($missions->toArray(), 'Missions saved successfully');
    }

    /**
     * Display the specified missions.
     * GET|HEAD /missions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var missions $missions */
        $missions = $this->missionsRepository->find($id);

        if (empty($missions)) {
            return $this->sendError('Missions not found');
        }

        return $this->sendResponse($missions->toArray(), 'Missions retrieved successfully');
    }

    /**
     * Update the specified missions in storage.
     * PUT/PATCH /missions/{id}
     *
     * @param int $id
     * @param UpdatemissionsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemissionsAPIRequest $request)
    {
        $input = $request->all();

        /** @var missions $missions */
        $missions = $this->missionsRepository->find($id);

        if (empty($missions)) {
            return $this->sendError('Missions not found');
        }

        $missions = $this->missionsRepository->update($input, $id);

        return $this->sendResponse($missions->toArray(), 'missions updated successfully');
    }

    /**
     * Remove the specified missions from storage.
     * DELETE /missions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var missions $missions */
        $missions = $this->missionsRepository->find($id);

        if (empty($missions)) {
            return $this->sendError('Missions not found');
        }

        $missions->delete();

        return $this->sendResponse($id, 'Missions deleted successfully');
    }
}
