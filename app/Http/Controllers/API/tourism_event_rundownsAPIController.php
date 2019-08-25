<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createtourism_event_rundownsAPIRequest;
use App\Http\Requests\API\Updatetourism_event_rundownsAPIRequest;
use App\Models\tourism_event_rundowns;
use App\Repositories\tourism_event_rundownsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class tourism_event_rundownsController
 * @package App\Http\Controllers\API
 */

class tourism_event_rundownsAPIController extends AppBaseController
{
    /** @var  tourism_event_rundownsRepository */
    private $tourismEventRundownsRepository;

    public function __construct(tourism_event_rundownsRepository $tourismEventRundownsRepo)
    {
        $this->tourismEventRundownsRepository = $tourismEventRundownsRepo;
    }

    /**
     * Display a listing of the tourism_event_rundowns.
     * GET|HEAD /tourismEventRundowns
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tourismEventRundowns = $this->tourismEventRundownsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tourismEventRundowns->toArray(), 'Tourism Event Rundowns retrieved successfully');
    }

    /**
     * Store a newly created tourism_event_rundowns in storage.
     * POST /tourismEventRundowns
     *
     * @param Createtourism_event_rundownsAPIRequest $request
     *
     * @return Response
     */
    public function store(Createtourism_event_rundownsAPIRequest $request)
    {
        $input = $request->all();

        $tourismEventRundowns = $this->tourismEventRundownsRepository->create($input);

        return $this->sendResponse($tourismEventRundowns->toArray(), 'Tourism Event Rundowns saved successfully');
    }

    /**
     * Display the specified tourism_event_rundowns.
     * GET|HEAD /tourismEventRundowns/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var tourism_event_rundowns $tourismEventRundowns */
        $tourismEventRundowns = $this->tourismEventRundownsRepository->find($id);

        if (empty($tourismEventRundowns)) {
            return $this->sendError('Tourism Event Rundowns not found');
        }

        return $this->sendResponse($tourismEventRundowns->toArray(), 'Tourism Event Rundowns retrieved successfully');
    }

    /**
     * Update the specified tourism_event_rundowns in storage.
     * PUT/PATCH /tourismEventRundowns/{id}
     *
     * @param int $id
     * @param Updatetourism_event_rundownsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetourism_event_rundownsAPIRequest $request)
    {
        $input = $request->all();

        /** @var tourism_event_rundowns $tourismEventRundowns */
        $tourismEventRundowns = $this->tourismEventRundownsRepository->find($id);

        if (empty($tourismEventRundowns)) {
            return $this->sendError('Tourism Event Rundowns not found');
        }

        $tourismEventRundowns = $this->tourismEventRundownsRepository->update($input, $id);

        return $this->sendResponse($tourismEventRundowns->toArray(), 'tourism_event_rundowns updated successfully');
    }

    /**
     * Remove the specified tourism_event_rundowns from storage.
     * DELETE /tourismEventRundowns/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var tourism_event_rundowns $tourismEventRundowns */
        $tourismEventRundowns = $this->tourismEventRundownsRepository->find($id);

        if (empty($tourismEventRundowns)) {
            return $this->sendError('Tourism Event Rundowns not found');
        }

        $tourismEventRundowns->delete();

        return $this->sendResponse($id, 'Tourism Event Rundowns deleted successfully');
    }
}
