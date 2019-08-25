<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createclient_bookmarksRequest;
use App\Http\Requests\Updateclient_bookmarksRequest;
use App\Repositories\client_bookmarksRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class client_bookmarksController extends AppBaseController
{
    /** @var  client_bookmarksRepository */
    private $clientBookmarksRepository;

    public function __construct(client_bookmarksRepository $clientBookmarksRepo)
    {
        $this->clientBookmarksRepository = $clientBookmarksRepo;
    }

    /**
     * Display a listing of the client_bookmarks.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $clientBookmarks = $this->clientBookmarksRepository->all();

        return view('client_bookmarks.index')
            ->with('clientBookmarks', $clientBookmarks);
    }

    /**
     * Show the form for creating a new client_bookmarks.
     *
     * @return Response
     */
    public function create()
    {
        return view('client_bookmarks.create');
    }

    /**
     * Store a newly created client_bookmarks in storage.
     *
     * @param Createclient_bookmarksRequest $request
     *
     * @return Response
     */
    public function store(Createclient_bookmarksRequest $request)
    {
        $input = $request->all();

        $clientBookmarks = $this->clientBookmarksRepository->create($input);

        Flash::success('Client Bookmarks saved successfully.');

        return redirect(route('clientBookmarks.index'));
    }

    /**
     * Display the specified client_bookmarks.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clientBookmarks = $this->clientBookmarksRepository->find($id);

        if (empty($clientBookmarks)) {
            Flash::error('Client Bookmarks not found');

            return redirect(route('clientBookmarks.index'));
        }

        return view('client_bookmarks.show')->with('clientBookmarks', $clientBookmarks);
    }

    /**
     * Show the form for editing the specified client_bookmarks.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clientBookmarks = $this->clientBookmarksRepository->find($id);

        if (empty($clientBookmarks)) {
            Flash::error('Client Bookmarks not found');

            return redirect(route('clientBookmarks.index'));
        }

        return view('client_bookmarks.edit')->with('clientBookmarks', $clientBookmarks);
    }

    /**
     * Update the specified client_bookmarks in storage.
     *
     * @param int $id
     * @param Updateclient_bookmarksRequest $request
     *
     * @return Response
     */
    public function update($id, Updateclient_bookmarksRequest $request)
    {
        $clientBookmarks = $this->clientBookmarksRepository->find($id);

        if (empty($clientBookmarks)) {
            Flash::error('Client Bookmarks not found');

            return redirect(route('clientBookmarks.index'));
        }

        $clientBookmarks = $this->clientBookmarksRepository->update($request->all(), $id);

        Flash::success('Client Bookmarks updated successfully.');

        return redirect(route('clientBookmarks.index'));
    }

    /**
     * Remove the specified client_bookmarks from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clientBookmarks = $this->clientBookmarksRepository->find($id);

        if (empty($clientBookmarks)) {
            Flash::error('Client Bookmarks not found');

            return redirect(route('clientBookmarks.index'));
        }

        $this->clientBookmarksRepository->delete($id);

        Flash::success('Client Bookmarks deleted successfully.');

        return redirect(route('clientBookmarks.index'));
    }
}
