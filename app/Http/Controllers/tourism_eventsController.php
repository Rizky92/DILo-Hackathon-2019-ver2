<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createtourism_eventsRequest;
use App\Http\Requests\Updatetourism_eventsRequest;
use App\Repositories\tourism_eventsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tourism_eventsController extends AppBaseController
{
    /** @var  tourism_eventsRepository */
    private $tourismEventsRepository;

    public function __construct(tourism_eventsRepository $tourismEventsRepo)
    {
        $this->tourismEventsRepository = $tourismEventsRepo;
    }

    /**
     * Display a listing of the tourism_events.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tourismEvents = $this->tourismEventsRepository->all();

        return view('tourism_events.index')
            ->with('tourismEvents', $tourismEvents);
    }

    /**
     * Show the form for creating a new tourism_events.
     *
     * @return Response
     */
    public function create()
    {
        return view('tourism_events.create');
    }

    /**
     * Store a newly created tourism_events in storage.
     *
     * @param Createtourism_eventsRequest $request
     *
     * @return Response
     */
    public function store(Createtourism_eventsRequest $request)
    {
        $input = $request->all();

        $tourismEvents = $this->tourismEventsRepository->create($input);

        Flash::success('Tourism Events saved successfully.');

        return redirect(route('tourismEvents.index'));
    }

    /**
     * Display the specified tourism_events.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tourismEvents = $this->tourismEventsRepository->find($id);

        if (empty($tourismEvents)) {
            Flash::error('Tourism Events not found');

            return redirect(route('tourismEvents.index'));
        }

        return view('tourism_events.show')->with('tourismEvents', $tourismEvents);
    }

    /**
     * Show the form for editing the specified tourism_events.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tourismEvents = $this->tourismEventsRepository->find($id);

        if (empty($tourismEvents)) {
            Flash::error('Tourism Events not found');

            return redirect(route('tourismEvents.index'));
        }

        return view('tourism_events.edit')->with('tourismEvents', $tourismEvents);
    }

    /**
     * Update the specified tourism_events in storage.
     *
     * @param int $id
     * @param Updatetourism_eventsRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetourism_eventsRequest $request)
    {
        $tourismEvents = $this->tourismEventsRepository->find($id);

        if (empty($tourismEvents)) {
            Flash::error('Tourism Events not found');

            return redirect(route('tourismEvents.index'));
        }

        $tourismEvents = $this->tourismEventsRepository->update($request->all(), $id);

        Flash::success('Tourism Events updated successfully.');

        return redirect(route('tourismEvents.index'));
    }

    /**
     * Remove the specified tourism_events from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tourismEvents = $this->tourismEventsRepository->find($id);

        if (empty($tourismEvents)) {
            Flash::error('Tourism Events not found');

            return redirect(route('tourismEvents.index'));
        }

        $this->tourismEventsRepository->delete($id);

        Flash::success('Tourism Events deleted successfully.');

        return redirect(route('tourismEvents.index'));
    }
}
