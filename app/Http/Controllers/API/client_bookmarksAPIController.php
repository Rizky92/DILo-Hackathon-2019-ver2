<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createclient_bookmarksAPIRequest;
use App\Http\Requests\API\Updateclient_bookmarksAPIRequest;
use App\Models\client_bookmarks;
use App\Repositories\client_bookmarksRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class client_bookmarksController
 * @package App\Http\Controllers\API
 */

class client_bookmarksAPIController extends AppBaseController
{
    /** @var  client_bookmarksRepository */
    private $clientBookmarksRepository;

    public function __construct(client_bookmarksRepository $clientBookmarksRepo)
    {
        $this->clientBookmarksRepository = $clientBookmarksRepo;
    }

    /**
     * Display a listing of the client_bookmarks.
     * GET|HEAD /clientBookmarks
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $clientBookmarks = $this->clientBookmarksRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($clientBookmarks->toArray(), 'Client Bookmarks retrieved successfully');
    }

    /**
     * Store a newly created client_bookmarks in storage.
     * POST /clientBookmarks
     *
     * @param Createclient_bookmarksAPIRequest $request
     *
     * @return Response
     */
    public function store(Createclient_bookmarksAPIRequest $request)
    {
        $input = $request->all();

        $clientBookmarks = $this->clientBookmarksRepository->create($input);

        return $this->sendResponse($clientBookmarks->toArray(), 'Client Bookmarks saved successfully');
    }

    /**
     * Display the specified client_bookmarks.
     * GET|HEAD /clientBookmarks/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var client_bookmarks $clientBookmarks */
        $clientBookmarks = $this->clientBookmarksRepository->find($id);

        if (empty($clientBookmarks)) {
            return $this->sendError('Client Bookmarks not found');
        }

        return $this->sendResponse($clientBookmarks->toArray(), 'Client Bookmarks retrieved successfully');
    }

    /**
     * Update the specified client_bookmarks in storage.
     * PUT/PATCH /clientBookmarks/{id}
     *
     * @param int $id
     * @param Updateclient_bookmarksAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateclient_bookmarksAPIRequest $request)
    {
        $input = $request->all();

        /** @var client_bookmarks $clientBookmarks */
        $clientBookmarks = $this->clientBookmarksRepository->find($id);

        if (empty($clientBookmarks)) {
            return $this->sendError('Client Bookmarks not found');
        }

        $clientBookmarks = $this->clientBookmarksRepository->update($input, $id);

        return $this->sendResponse($clientBookmarks->toArray(), 'client_bookmarks updated successfully');
    }

    /**
     * Remove the specified client_bookmarks from storage.
     * DELETE /clientBookmarks/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var client_bookmarks $clientBookmarks */
        $clientBookmarks = $this->clientBookmarksRepository->find($id);

        if (empty($clientBookmarks)) {
            return $this->sendError('Client Bookmarks not found');
        }

        $clientBookmarks->delete();

        return $this->sendResponse($id, 'Client Bookmarks deleted successfully');
    }
}
