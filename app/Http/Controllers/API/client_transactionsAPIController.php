<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createclient_transactionsAPIRequest;
use App\Http\Requests\API\Updateclient_transactionsAPIRequest;
use App\Models\client_transactions;
use App\Repositories\client_transactionsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class client_transactionsController
 * @package App\Http\Controllers\API
 */

class client_transactionsAPIController extends AppBaseController
{
    /** @var  client_transactionsRepository */
    private $clientTransactionsRepository;

    public function __construct(client_transactionsRepository $clientTransactionsRepo)
    {
        $this->clientTransactionsRepository = $clientTransactionsRepo;
    }

    /**
     * Display a listing of the client_transactions.
     * GET|HEAD /clientTransactions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $clientTransactions = $this->clientTransactionsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($clientTransactions->toArray(), 'Client Transactions retrieved successfully');
    }

    /**
     * Store a newly created client_transactions in storage.
     * POST /clientTransactions
     *
     * @param Createclient_transactionsAPIRequest $request
     *
     * @return Response
     */
    public function store(Createclient_transactionsAPIRequest $request)
    {
        $input = $request->all();

        $clientTransactions = $this->clientTransactionsRepository->create($input);

        return $this->sendResponse($clientTransactions->toArray(), 'Client Transactions saved successfully');
    }

    /**
     * Display the specified client_transactions.
     * GET|HEAD /clientTransactions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var client_transactions $clientTransactions */
        $clientTransactions = $this->clientTransactionsRepository->find($id);

        if (empty($clientTransactions)) {
            return $this->sendError('Client Transactions not found');
        }

        return $this->sendResponse($clientTransactions->toArray(), 'Client Transactions retrieved successfully');
    }

    /**
     * Update the specified client_transactions in storage.
     * PUT/PATCH /clientTransactions/{id}
     *
     * @param int $id
     * @param Updateclient_transactionsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateclient_transactionsAPIRequest $request)
    {
        $input = $request->all();

        /** @var client_transactions $clientTransactions */
        $clientTransactions = $this->clientTransactionsRepository->find($id);

        if (empty($clientTransactions)) {
            return $this->sendError('Client Transactions not found');
        }

        $clientTransactions = $this->clientTransactionsRepository->update($input, $id);

        return $this->sendResponse($clientTransactions->toArray(), 'client_transactions updated successfully');
    }

    /**
     * Remove the specified client_transactions from storage.
     * DELETE /clientTransactions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var client_transactions $clientTransactions */
        $clientTransactions = $this->clientTransactionsRepository->find($id);

        if (empty($clientTransactions)) {
            return $this->sendError('Client Transactions not found');
        }

        $clientTransactions->delete();

        return $this->sendResponse($id, 'Client Transactions deleted successfully');
    }
}
