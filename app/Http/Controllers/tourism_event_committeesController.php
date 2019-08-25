<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createtourism_event_committeesRequest;
use App\Http\Requests\Updatetourism_event_committeesRequest;
use App\Repositories\tourism_event_committeesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tourism_event_committeesController extends AppBaseController
{
    /** @var  tourism_event_committeesRepository */
    private $tourismEventCommitteesRepository;

    public function __construct(tourism_event_committeesRepository $tourismEventCommitteesRepo)
    {
        $this->tourismEventCommitteesRepository = $tourismEventCommitteesRepo;
    }

    /**
     * Display a listing of the tourism_event_committees.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tourismEventCommittees = $this->tourismEventCommitteesRepository->all();

        return view('tourism_event_committees.index')
            ->with('tourismEventCommittees', $tourismEventCommittees);
    }

    /**
     * Show the form for creating a new tourism_event_committees.
     *
     * @return Response
     */
    public function create()
    {
        return view('tourism_event_committees.create');
    }

    /**
     * Store a newly created tourism_event_committees in storage.
     *
     * @param Createtourism_event_committeesRequest $request
     *
     * @return Response
     */
    public function store(Createtourism_event_committeesRequest $request)
    {
        $input = $request->all();

        $tourismEventCommittees = $this->tourismEventCommitteesRepository->create($input);

        Flash::success('Tourism Event Committees saved successfully.');

        return redirect(route('tourismEventCommittees.index'));
    }

    /**
     * Display the specified tourism_event_committees.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tourismEventCommittees = $this->tourismEventCommitteesRepository->find($id);

        if (empty($tourismEventCommittees)) {
            Flash::error('Tourism Event Committees not found');

            return redirect(route('tourismEventCommittees.index'));
        }

        return view('tourism_event_committees.show')->with('tourismEventCommittees', $tourismEventCommittees);
    }

    /**
     * Show the form for editing the specified tourism_event_committees.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tourismEventCommittees = $this->tourismEventCommitteesRepository->find($id);

        if (empty($tourismEventCommittees)) {
            Flash::error('Tourism Event Committees not found');

            return redirect(route('tourismEventCommittees.index'));
        }

        return view('tourism_event_committees.edit')->with('tourismEventCommittees', $tourismEventCommittees);
    }

    /**
     * Update the specified tourism_event_committees in storage.
     *
     * @param int $id
     * @param Updatetourism_event_committeesRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetourism_event_committeesRequest $request)
    {
        $tourismEventCommittees = $this->tourismEventCommitteesRepository->find($id);

        if (empty($tourismEventCommittees)) {
            Flash::error('Tourism Event Committees not found');

            return redirect(route('tourismEventCommittees.index'));
        }

        $tourismEventCommittees = $this->tourismEventCommitteesRepository->update($request->all(), $id);

        Flash::success('Tourism Event Committees updated successfully.');

        return redirect(route('tourismEventCommittees.index'));
    }

    /**
     * Remove the specified tourism_event_committees from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tourismEventCommittees = $this->tourismEventCommitteesRepository->find($id);

        if (empty($tourismEventCommittees)) {
            Flash::error('Tourism Event Committees not found');

            return redirect(route('tourismEventCommittees.index'));
        }

        $this->tourismEventCommitteesRepository->delete($id);

        Flash::success('Tourism Event Committees deleted successfully.');

        return redirect(route('tourismEventCommittees.index'));
    }
}
