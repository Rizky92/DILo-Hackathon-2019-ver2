<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createclient_reviewsRequest;
use App\Http\Requests\Updateclient_reviewsRequest;
use App\Repositories\client_reviewsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class client_reviewsController extends AppBaseController
{
    /** @var  client_reviewsRepository */
    private $clientReviewsRepository;

    public function __construct(client_reviewsRepository $clientReviewsRepo)
    {
        $this->clientReviewsRepository = $clientReviewsRepo;
    }

    /**
     * Display a listing of the client_reviews.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $clientReviews = $this->clientReviewsRepository->all();

        return view('client_reviews.index')
            ->with('clientReviews', $clientReviews);
    }

    /**
     * Show the form for creating a new client_reviews.
     *
     * @return Response
     */
    public function create()
    {
        return view('client_reviews.create');
    }

    /**
     * Store a newly created client_reviews in storage.
     *
     * @param Createclient_reviewsRequest $request
     *
     * @return Response
     */
    public function store(Createclient_reviewsRequest $request)
    {
        $input = $request->all();

        $clientReviews = $this->clientReviewsRepository->create($input);

        Flash::success('Client Reviews saved successfully.');

        return redirect(route('clientReviews.index'));
    }

    /**
     * Display the specified client_reviews.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clientReviews = $this->clientReviewsRepository->find($id);

        if (empty($clientReviews)) {
            Flash::error('Client Reviews not found');

            return redirect(route('clientReviews.index'));
        }

        return view('client_reviews.show')->with('clientReviews', $clientReviews);
    }

    /**
     * Show the form for editing the specified client_reviews.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clientReviews = $this->clientReviewsRepository->find($id);

        if (empty($clientReviews)) {
            Flash::error('Client Reviews not found');

            return redirect(route('clientReviews.index'));
        }

        return view('client_reviews.edit')->with('clientReviews', $clientReviews);
    }

    /**
     * Update the specified client_reviews in storage.
     *
     * @param int $id
     * @param Updateclient_reviewsRequest $request
     *
     * @return Response
     */
    public function update($id, Updateclient_reviewsRequest $request)
    {
        $clientReviews = $this->clientReviewsRepository->find($id);

        if (empty($clientReviews)) {
            Flash::error('Client Reviews not found');

            return redirect(route('clientReviews.index'));
        }

        $clientReviews = $this->clientReviewsRepository->update($request->all(), $id);

        Flash::success('Client Reviews updated successfully.');

        return redirect(route('clientReviews.index'));
    }

    /**
     * Remove the specified client_reviews from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clientReviews = $this->clientReviewsRepository->find($id);

        if (empty($clientReviews)) {
            Flash::error('Client Reviews not found');

            return redirect(route('clientReviews.index'));
        }

        $this->clientReviewsRepository->delete($id);

        Flash::success('Client Reviews deleted successfully.');

        return redirect(route('clientReviews.index'));
    }
}
