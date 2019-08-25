<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createclient_scoresRequest;
use App\Http\Requests\Updateclient_scoresRequest;
use App\Repositories\client_scoresRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class client_scoresController extends AppBaseController
{
    /** @var  client_scoresRepository */
    private $clientScoresRepository;

    public function __construct(client_scoresRepository $clientScoresRepo)
    {
        $this->clientScoresRepository = $clientScoresRepo;
    }

    /**
     * Display a listing of the client_scores.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $clientScores = $this->clientScoresRepository->all();

        return view('client_scores.index')
            ->with('clientScores', $clientScores);
    }

    /**
     * Show the form for creating a new client_scores.
     *
     * @return Response
     */
    public function create()
    {
        return view('client_scores.create');
    }

    /**
     * Store a newly created client_scores in storage.
     *
     * @param Createclient_scoresRequest $request
     *
     * @return Response
     */
    public function store(Createclient_scoresRequest $request)
    {
        $input = $request->all();

        $clientScores = $this->clientScoresRepository->create($input);

        Flash::success('Client Scores saved successfully.');

        return redirect(route('clientScores.index'));
    }

    /**
     * Display the specified client_scores.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clientScores = $this->clientScoresRepository->find($id);

        if (empty($clientScores)) {
            Flash::error('Client Scores not found');

            return redirect(route('clientScores.index'));
        }

        return view('client_scores.show')->with('clientScores', $clientScores);
    }

    /**
     * Show the form for editing the specified client_scores.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clientScores = $this->clientScoresRepository->find($id);

        if (empty($clientScores)) {
            Flash::error('Client Scores not found');

            return redirect(route('clientScores.index'));
        }

        return view('client_scores.edit')->with('clientScores', $clientScores);
    }

    /**
     * Update the specified client_scores in storage.
     *
     * @param int $id
     * @param Updateclient_scoresRequest $request
     *
     * @return Response
     */
    public function update($id, Updateclient_scoresRequest $request)
    {
        $clientScores = $this->clientScoresRepository->find($id);

        if (empty($clientScores)) {
            Flash::error('Client Scores not found');

            return redirect(route('clientScores.index'));
        }

        $clientScores = $this->clientScoresRepository->update($request->all(), $id);

        Flash::success('Client Scores updated successfully.');

        return redirect(route('clientScores.index'));
    }

    /**
     * Remove the specified client_scores from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clientScores = $this->clientScoresRepository->find($id);

        if (empty($clientScores)) {
            Flash::error('Client Scores not found');

            return redirect(route('clientScores.index'));
        }

        $this->clientScoresRepository->delete($id);

        Flash::success('Client Scores deleted successfully.');

        return redirect(route('clientScores.index'));
    }
}
