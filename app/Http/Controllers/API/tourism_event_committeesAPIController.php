<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createtourism_event_committeesAPIRequest;
use App\Http\Requests\API\Updatetourism_event_committeesAPIRequest;
use App\Models\tourism_event_committees;
use App\Repositories\tourism_event_committeesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class tourism_event_committeesController
 * @package App\Http\Controllers\API
 */

class tourism_event_committeesAPIController extends AppBaseController
{
    /** @var  tourism_event_committeesRepository */
    private $tourismEventCommitteesRepository;

    public function __construct(tourism_event_committeesRepository $tourismEventCommitteesRepo)
    {
        $this->tourismEventCommitteesRepository = $tourismEventCommitteesRepo;
    }

    /**
     * Display a listing of the tourism_event_committees.
     * GET|HEAD /tourismEventCommittees
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tourismEventCommittees = $this->tourismEventCommitteesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tourismEventCommittees->toArray(), 'Tourism Event Committees retrieved successfully');
    }

    /**
     * Store a newly created tourism_event_committees in storage.
     * POST /tourismEventCommittees
     *
     * @param Createtourism_event_committeesAPIRequest $request
     *
     * @return Response
     */
    public function store(Createtourism_event_committeesAPIRequest $request)
    {
        $input = $request->all();

        $tourismEventCommittees = $this->tourismEventCommitteesRepository->create($input);

        return $this->sendResponse($tourismEventCommittees->toArray(), 'Tourism Event Committees saved successfully');
    }

    /**
     * Display the specified tourism_event_committees.
     * GET|HEAD /tourismEventCommittees/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var tourism_event_committees $tourismEventCommittees */
        $tourismEventCommittees = $this->tourismEventCommitteesRepository->find($id);

        if (empty($tourismEventCommittees)) {
            return $this->sendError('Tourism Event Committees not found');
        }

        return $this->sendResponse($tourismEventCommittees->toArray(), 'Tourism Event Committees retrieved successfully');
    }

    /**
     * Update the specified tourism_event_committees in storage.
     * PUT/PATCH /tourismEventCommittees/{id}
     *
     * @param int $id
     * @param Updatetourism_event_committeesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetourism_event_committeesAPIRequest $request)
    {
        $input = $request->all();

        /** @var tourism_event_committees $tourismEventCommittees */
        $tourismEventCommittees = $this->tourismEventCommitteesRepository->find($id);

        if (empty($tourismEventCommittees)) {
            return $this->sendError('Tourism Event Committees not found');
        }

        $tourismEventCommittees = $this->tourismEventCommitteesRepository->update($input, $id);

        return $this->sendResponse($tourismEventCommittees->toArray(), 'tourism_event_committees updated successfully');
    }

    /**
     * Remove the specified tourism_event_committees from storage.
     * DELETE /tourismEventCommittees/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var tourism_event_committees $tourismEventCommittees */
        $tourismEventCommittees = $this->tourismEventCommitteesRepository->find($id);

        if (empty($tourismEventCommittees)) {
            return $this->sendError('Tourism Event Committees not found');
        }

        $tourismEventCommittees->delete();

        return $this->sendResponse($id, 'Tourism Event Committees deleted successfully');
    }
}
