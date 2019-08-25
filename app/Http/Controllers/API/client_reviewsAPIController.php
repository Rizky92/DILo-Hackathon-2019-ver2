<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createclient_reviewsAPIRequest;
use App\Http\Requests\API\Updateclient_reviewsAPIRequest;
use App\Models\client_reviews;
use App\Repositories\client_reviewsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class client_reviewsController
 * @package App\Http\Controllers\API
 */

class client_reviewsAPIController extends AppBaseController
{
    /** @var  client_reviewsRepository */
    private $clientReviewsRepository;

    public function __construct(client_reviewsRepository $clientReviewsRepo)
    {
        $this->clientReviewsRepository = $clientReviewsRepo;
    }

    /**
     * Display a listing of the client_reviews.
     * GET|HEAD /clientReviews
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $clientReviews = $this->clientReviewsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($clientReviews->toArray(), 'Client Reviews retrieved successfully');
    }

    /**
     * Store a newly created client_reviews in storage.
     * POST /clientReviews
     *
     * @param Createclient_reviewsAPIRequest $request
     *
     * @return Response
     */
    public function store(Createclient_reviewsAPIRequest $request)
    {
        $input = $request->all();

        $clientReviews = $this->clientReviewsRepository->create($input);

        return $this->sendResponse($clientReviews->toArray(), 'Client Reviews saved successfully');
    }

    /**
     * Display the specified client_reviews.
     * GET|HEAD /clientReviews/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var client_reviews $clientReviews */
        $clientReviews = $this->clientReviewsRepository->find($id);

        if (empty($clientReviews)) {
            return $this->sendError('Client Reviews not found');
        }

        return $this->sendResponse($clientReviews->toArray(), 'Client Reviews retrieved successfully');
    }

    /**
     * Update the specified client_reviews in storage.
     * PUT/PATCH /clientReviews/{id}
     *
     * @param int $id
     * @param Updateclient_reviewsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateclient_reviewsAPIRequest $request)
    {
        $input = $request->all();

        /** @var client_reviews $clientReviews */
        $clientReviews = $this->clientReviewsRepository->find($id);

        if (empty($clientReviews)) {
            return $this->sendError('Client Reviews not found');
        }

        $clientReviews = $this->clientReviewsRepository->update($input, $id);

        return $this->sendResponse($clientReviews->toArray(), 'client_reviews updated successfully');
    }

    /**
     * Remove the specified client_reviews from storage.
     * DELETE /clientReviews/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var client_reviews $clientReviews */
        $clientReviews = $this->clientReviewsRepository->find($id);

        if (empty($clientReviews)) {
            return $this->sendError('Client Reviews not found');
        }

        $clientReviews->delete();

        return $this->sendResponse($id, 'Client Reviews deleted successfully');
    }
}
