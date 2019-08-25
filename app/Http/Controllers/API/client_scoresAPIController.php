<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createclient_scoresAPIRequest;
use App\Http\Requests\API\Updateclient_scoresAPIRequest;
use App\Models\client_scores;
use App\Repositories\client_scoresRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class client_scoresController
 * @package App\Http\Controllers\API
 */

class client_scoresAPIController extends AppBaseController
{
    /** @var  client_scoresRepository */
    private $clientScoresRepository;

    public function __construct(client_scoresRepository $clientScoresRepo)
    {
        $this->clientScoresRepository = $clientScoresRepo;
    }

    /**
     * Display a listing of the client_scores.
     * GET|HEAD /clientScores
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $clientScores = $this->clientScoresRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($clientScores->toArray(), 'Client Scores retrieved successfully');
    }

    /**
     * Store a newly created client_scores in storage.
     * POST /clientScores
     *
     * @param Createclient_scoresAPIRequest $request
     *
     * @return Response
     */
    public function store(Createclient_scoresAPIRequest $request)
    {
        $input = $request->all();

        $clientScores = $this->clientScoresRepository->create($input);

        return $this->sendResponse($clientScores->toArray(), 'Client Scores saved successfully');
    }

    /**
     * Display the specified client_scores.
     * GET|HEAD /clientScores/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var client_scores $clientScores */
        $clientScores = $this->clientScoresRepository->find($id);

        if (empty($clientScores)) {
            return $this->sendError('Client Scores not found');
        }

        return $this->sendResponse($clientScores->toArray(), 'Client Scores retrieved successfully');
    }

    /**
     * Update the specified client_scores in storage.
     * PUT/PATCH /clientScores/{id}
     *
     * @param int $id
     * @param Updateclient_scoresAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateclient_scoresAPIRequest $request)
    {
        $input = $request->all();

        /** @var client_scores $clientScores */
        $clientScores = $this->clientScoresRepository->find($id);

        if (empty($clientScores)) {
            return $this->sendError('Client Scores not found');
        }

        $clientScores = $this->clientScoresRepository->update($input, $id);

        return $this->sendResponse($clientScores->toArray(), 'client_scores updated successfully');
    }

    /**
     * Remove the specified client_scores from storage.
     * DELETE /clientScores/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var client_scores $clientScores */
        $clientScores = $this->clientScoresRepository->find($id);

        if (empty($clientScores)) {
            return $this->sendError('Client Scores not found');
        }

        $clientScores->delete();

        return $this->sendResponse($id, 'Client Scores deleted successfully');
    }
}
