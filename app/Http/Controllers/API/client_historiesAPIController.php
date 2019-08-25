<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createclient_historiesAPIRequest;
use App\Http\Requests\API\Updateclient_historiesAPIRequest;
use App\Models\client_histories;
use App\Repositories\client_historiesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class client_historiesController
 * @package App\Http\Controllers\API
 */

class client_historiesAPIController extends AppBaseController
{
    /** @var  client_historiesRepository */
    private $clientHistoriesRepository;

    public function __construct(client_historiesRepository $clientHistoriesRepo)
    {
        $this->clientHistoriesRepository = $clientHistoriesRepo;
    }

    /**
     * Display a listing of the client_histories.
     * GET|HEAD /clientHistories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $clientHistories = $this->clientHistoriesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($clientHistories->toArray(), 'Client Histories retrieved successfully');
    }

    /**
     * Store a newly created client_histories in storage.
     * POST /clientHistories
     *
     * @param Createclient_historiesAPIRequest $request
     *
     * @return Response
     */
    public function store(Createclient_historiesAPIRequest $request)
    {
        $input = $request->all();

        $clientHistories = $this->clientHistoriesRepository->create($input);

        return $this->sendResponse($clientHistories->toArray(), 'Client Histories saved successfully');
    }

    /**
     * Display the specified client_histories.
     * GET|HEAD /clientHistories/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var client_histories $clientHistories */
        $clientHistories = $this->clientHistoriesRepository->find($id);

        if (empty($clientHistories)) {
            return $this->sendError('Client Histories not found');
        }

        return $this->sendResponse($clientHistories->toArray(), 'Client Histories retrieved successfully');
    }

    /**
     * Update the specified client_histories in storage.
     * PUT/PATCH /clientHistories/{id}
     *
     * @param int $id
     * @param Updateclient_historiesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateclient_historiesAPIRequest $request)
    {
        $input = $request->all();

        /** @var client_histories $clientHistories */
        $clientHistories = $this->clientHistoriesRepository->find($id);

        if (empty($clientHistories)) {
            return $this->sendError('Client Histories not found');
        }

        $clientHistories = $this->clientHistoriesRepository->update($input, $id);

        return $this->sendResponse($clientHistories->toArray(), 'client_histories updated successfully');
    }

    /**
     * Remove the specified client_histories from storage.
     * DELETE /clientHistories/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var client_histories $clientHistories */
        $clientHistories = $this->clientHistoriesRepository->find($id);

        if (empty($clientHistories)) {
            return $this->sendError('Client Histories not found');
        }

        $clientHistories->delete();

        return $this->sendResponse($id, 'Client Histories deleted successfully');
    }
}
