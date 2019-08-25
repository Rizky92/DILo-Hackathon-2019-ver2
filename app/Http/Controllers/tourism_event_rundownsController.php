<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createtourism_event_rundownsRequest;
use App\Http\Requests\Updatetourism_event_rundownsRequest;
use App\Repositories\tourism_event_rundownsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tourism_event_rundownsController extends AppBaseController
{
    /** @var  tourism_event_rundownsRepository */
    private $tourismEventRundownsRepository;

    public function __construct(tourism_event_rundownsRepository $tourismEventRundownsRepo)
    {
        $this->tourismEventRundownsRepository = $tourismEventRundownsRepo;
    }

    /**
     * Display a listing of the tourism_event_rundowns.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tourismEventRundowns = $this->tourismEventRundownsRepository->all();

        return view('tourism_event_rundowns.index')
            ->with('tourismEventRundowns', $tourismEventRundowns);
    }

    /**
     * Show the form for creating a new tourism_event_rundowns.
     *
     * @return Response
     */
    public function create()
    {
        return view('tourism_event_rundowns.create');
    }

    /**
     * Store a newly created tourism_event_rundowns in storage.
     *
     * @param Createtourism_event_rundownsRequest $request
     *
     * @return Response
     */
    public function store(Createtourism_event_rundownsRequest $request)
    {
        $input = $request->all();

        $tourismEventRundowns = $this->tourismEventRundownsRepository->create($input);

        Flash::success('Tourism Event Rundowns saved successfully.');

        return redirect(route('tourismEventRundowns.index'));
    }

    /**
     * Display the specified tourism_event_rundowns.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tourismEventRundowns = $this->tourismEventRundownsRepository->find($id);

        if (empty($tourismEventRundowns)) {
            Flash::error('Tourism Event Rundowns not found');

            return redirect(route('tourismEventRundowns.index'));
        }

        return view('tourism_event_rundowns.show')->with('tourismEventRundowns', $tourismEventRundowns);
    }

    /**
     * Show the form for editing the specified tourism_event_rundowns.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tourismEventRundowns = $this->tourismEventRundownsRepository->find($id);

        if (empty($tourismEventRundowns)) {
            Flash::error('Tourism Event Rundowns not found');

            return redirect(route('tourismEventRundowns.index'));
        }

        return view('tourism_event_rundowns.edit')->with('tourismEventRundowns', $tourismEventRundowns);
    }

    /**
     * Update the specified tourism_event_rundowns in storage.
     *
     * @param int $id
     * @param Updatetourism_event_rundownsRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetourism_event_rundownsRequest $request)
    {
        $tourismEventRundowns = $this->tourismEventRundownsRepository->find($id);

        if (empty($tourismEventRundowns)) {
            Flash::error('Tourism Event Rundowns not found');

            return redirect(route('tourismEventRundowns.index'));
        }

        $tourismEventRundowns = $this->tourismEventRundownsRepository->update($request->all(), $id);

        Flash::success('Tourism Event Rundowns updated successfully.');

        return redirect(route('tourismEventRundowns.index'));
    }

    /**
     * Remove the specified tourism_event_rundowns from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tourismEventRundowns = $this->tourismEventRundownsRepository->find($id);

        if (empty($tourismEventRundowns)) {
            Flash::error('Tourism Event Rundowns not found');

            return redirect(route('tourismEventRundowns.index'));
        }

        $this->tourismEventRundownsRepository->delete($id);

        Flash::success('Tourism Event Rundowns deleted successfully.');

        return redirect(route('tourismEventRundowns.index'));
    }
}
