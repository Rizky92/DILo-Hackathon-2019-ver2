<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createclient_transactionsRequest;
use App\Http\Requests\Updateclient_transactionsRequest;
use App\Repositories\client_transactionsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class client_transactionsController extends AppBaseController
{
    /** @var  client_transactionsRepository */
    private $clientTransactionsRepository;

    public function __construct(client_transactionsRepository $clientTransactionsRepo)
    {
        $this->clientTransactionsRepository = $clientTransactionsRepo;
    }

    /**
     * Display a listing of the client_transactions.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $clientTransactions = $this->clientTransactionsRepository->all();

        return view('client_transactions.index')
            ->with('clientTransactions', $clientTransactions);
    }

    /**
     * Show the form for creating a new client_transactions.
     *
     * @return Response
     */
    public function create()
    {
        return view('client_transactions.create');
    }

    /**
     * Store a newly created client_transactions in storage.
     *
     * @param Createclient_transactionsRequest $request
     *
     * @return Response
     */
    public function store(Createclient_transactionsRequest $request)
    {
        $input = $request->all();

        $clientTransactions = $this->clientTransactionsRepository->create($input);

        Flash::success('Client Transactions saved successfully.');

        return redirect(route('clientTransactions.index'));
    }

    /**
     * Display the specified client_transactions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clientTransactions = $this->clientTransactionsRepository->find($id);

        if (empty($clientTransactions)) {
            Flash::error('Client Transactions not found');

            return redirect(route('clientTransactions.index'));
        }

        return view('client_transactions.show')->with('clientTransactions', $clientTransactions);
    }

    /**
     * Show the form for editing the specified client_transactions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clientTransactions = $this->clientTransactionsRepository->find($id);

        if (empty($clientTransactions)) {
            Flash::error('Client Transactions not found');

            return redirect(route('clientTransactions.index'));
        }

        return view('client_transactions.edit')->with('clientTransactions', $clientTransactions);
    }

    /**
     * Update the specified client_transactions in storage.
     *
     * @param int $id
     * @param Updateclient_transactionsRequest $request
     *
     * @return Response
     */
    public function update($id, Updateclient_transactionsRequest $request)
    {
        $clientTransactions = $this->clientTransactionsRepository->find($id);

        if (empty($clientTransactions)) {
            Flash::error('Client Transactions not found');

            return redirect(route('clientTransactions.index'));
        }

        $clientTransactions = $this->clientTransactionsRepository->update($request->all(), $id);

        Flash::success('Client Transactions updated successfully.');

        return redirect(route('clientTransactions.index'));
    }

    /**
     * Remove the specified client_transactions from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clientTransactions = $this->clientTransactionsRepository->find($id);

        if (empty($clientTransactions)) {
            Flash::error('Client Transactions not found');

            return redirect(route('clientTransactions.index'));
        }

        $this->clientTransactionsRepository->delete($id);

        Flash::success('Client Transactions deleted successfully.');

        return redirect(route('clientTransactions.index'));
    }
}
