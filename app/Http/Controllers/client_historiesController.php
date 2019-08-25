<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createclient_historiesRequest;
use App\Http\Requests\Updateclient_historiesRequest;
use App\Repositories\client_historiesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class client_historiesController extends AppBaseController
{
    /** @var  client_historiesRepository */
    private $clientHistoriesRepository;

    public function __construct(client_historiesRepository $clientHistoriesRepo)
    {
        $this->clientHistoriesRepository = $clientHistoriesRepo;
    }

    /**
     * Display a listing of the client_histories.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $clientHistories = $this->clientHistoriesRepository->all();

        return view('client_histories.index')
            ->with('clientHistories', $clientHistories);
    }

    /**
     * Show the form for creating a new client_histories.
     *
     * @return Response
     */
    public function create()
    {
        return view('client_histories.create');
    }

    /**
     * Store a newly created client_histories in storage.
     *
     * @param Createclient_historiesRequest $request
     *
     * @return Response
     */
    public function store(Createclient_historiesRequest $request)
    {
        $input = $request->all();

        $clientHistories = $this->clientHistoriesRepository->create($input);

        Flash::success('Client Histories saved successfully.');

        return redirect(route('clientHistories.index'));
    }

    /**
     * Display the specified client_histories.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clientHistories = $this->clientHistoriesRepository->find($id);

        if (empty($clientHistories)) {
            Flash::error('Client Histories not found');

            return redirect(route('clientHistories.index'));
        }

        return view('client_histories.show')->with('clientHistories', $clientHistories);
    }

    /**
     * Show the form for editing the specified client_histories.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clientHistories = $this->clientHistoriesRepository->find($id);

        if (empty($clientHistories)) {
            Flash::error('Client Histories not found');

            return redirect(route('clientHistories.index'));
        }

        return view('client_histories.edit')->with('clientHistories', $clientHistories);
    }

    /**
     * Update the specified client_histories in storage.
     *
     * @param int $id
     * @param Updateclient_historiesRequest $request
     *
     * @return Response
     */
    public function update($id, Updateclient_historiesRequest $request)
    {
        $clientHistories = $this->clientHistoriesRepository->find($id);

        if (empty($clientHistories)) {
            Flash::error('Client Histories not found');

            return redirect(route('clientHistories.index'));
        }

        $clientHistories = $this->clientHistoriesRepository->update($request->all(), $id);

        Flash::success('Client Histories updated successfully.');

        return redirect(route('clientHistories.index'));
    }

    /**
     * Remove the specified client_histories from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clientHistories = $this->clientHistoriesRepository->find($id);

        if (empty($clientHistories)) {
            Flash::error('Client Histories not found');

            return redirect(route('clientHistories.index'));
        }

        $this->clientHistoriesRepository->delete($id);

        Flash::success('Client Histories deleted successfully.');

        return redirect(route('clientHistories.index'));
    }
}
