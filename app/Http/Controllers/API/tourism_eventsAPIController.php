<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createtourism_eventsAPIRequest;
use App\Http\Requests\API\Updatetourism_eventsAPIRequest;
use App\Models\tourism_events;
use App\Repositories\tourism_eventsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class tourism_eventsController
 * @package App\Http\Controllers\API
 */

class tourism_eventsAPIController extends AppBaseController
{
    /** @var  tourism_eventsRepository */
    private $tourismEventsRepository;

    public function __construct(tourism_eventsRepository $tourismEventsRepo)
    {
        $this->tourismEventsRepository = $tourismEventsRepo;
    }

    /**
     * Display a listing of the tourism_events.
     * GET|HEAD /tourismEvents
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tourismEvents = $this->tourismEventsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tourismEvents->toArray(), 'Tourism Events retrieved successfully');
    }

    /**
     * Store a newly created tourism_events in storage.
     * POST /tourismEvents
     *
     * @param Createtourism_eventsAPIRequest $request
     *
     * @return Response
     */
    public function store(Createtourism_eventsAPIRequest $request)
    {
        $input = $request->all();

        $tourismEvents = $this->tourismEventsRepository->create($input);

        return $this->sendResponse($tourismEvents->toArray(), 'Tourism Events saved successfully');
    }

    /**
     * Display the specified tourism_events.
     * GET|HEAD /tourismEvents/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var tourism_events $tourismEvents */
        $tourismEvents = $this->tourismEventsRepository->find($id);

        if (empty($tourismEvents)) {
            return $this->sendError('Tourism Events not found');
        }

        return $this->sendResponse($tourismEvents->toArray(), 'Tourism Events retrieved successfully');
    }

    /**
     * Update the specified tourism_events in storage.
     * PUT/PATCH /tourismEvents/{id}
     *
     * @param int $id
     * @param Updatetourism_eventsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetourism_eventsAPIRequest $request)
    {
        $input = $request->all();

        /** @var tourism_events $tourismEvents */
        $tourismEvents = $this->tourismEventsRepository->find($id);

        if (empty($tourismEvents)) {
            return $this->sendError('Tourism Events not found');
        }

        $tourismEvents = $this->tourismEventsRepository->update($input, $id);

        return $this->sendResponse($tourismEvents->toArray(), 'tourism_events updated successfully');
    }

    /**
     * Remove the specified tourism_events from storage.
     * DELETE /tourismEvents/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var tourism_events $tourismEvents */
        $tourismEvents = $this->tourismEventsRepository->find($id);

        if (empty($tourismEvents)) {
            return $this->sendError('Tourism Events not found');
        }

        $tourismEvents->delete();

        return $this->sendResponse($id, 'Tourism Events deleted successfully');
    }
}
