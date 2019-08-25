<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createclient_usersAPIRequest;
use App\Http\Requests\API\Updateclient_usersAPIRequest;
use App\Models\client_users;
use App\Repositories\client_usersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class client_usersController
 * @package App\Http\Controllers\API
 */

class client_usersAPIController extends AppBaseController
{
    /** @var  client_usersRepository */
    private $clientUsersRepository;

    public function __construct(client_usersRepository $clientUsersRepo)
    {
        $this->clientUsersRepository = $clientUsersRepo;
    }

    /**
     * Display a listing of the client_users.
     * GET|HEAD /clientUsers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $clientUsers = $this->clientUsersRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($clientUsers->toArray(), 'Client Users retrieved successfully');
    }

    /**
     * Store a newly created client_users in storage.
     * POST /clientUsers
     *
     * @param Createclient_usersAPIRequest $request
     *
     * @return Response
     */
    public function store(Createclient_usersAPIRequest $request)
    {
        $input = $request->all();

        $clientUsers = $this->clientUsersRepository->create($input);

        return $this->sendResponse($clientUsers->toArray(), 'Client Users saved successfully');
    }

    /**
     * Display the specified client_users.
     * GET|HEAD /clientUsers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var client_users $clientUsers */
        $clientUsers = $this->clientUsersRepository->find($id);

        if (empty($clientUsers)) {
            return $this->sendError('Client Users not found');
        }

        return $this->sendResponse($clientUsers->toArray(), 'Client Users retrieved successfully');
    }

    /**
     * Update the specified client_users in storage.
     * PUT/PATCH /clientUsers/{id}
     *
     * @param int $id
     * @param Updateclient_usersAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateclient_usersAPIRequest $request)
    {
        $input = $request->all();

        /** @var client_users $clientUsers */
        $clientUsers = $this->clientUsersRepository->find($id);

        if (empty($clientUsers)) {
            return $this->sendError('Client Users not found');
        }

        $clientUsers = $this->clientUsersRepository->update($input, $id);

        return $this->sendResponse($clientUsers->toArray(), 'client_users updated successfully');
    }

    /**
     * Remove the specified client_users from storage.
     * DELETE /clientUsers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var client_users $clientUsers */
        $clientUsers = $this->clientUsersRepository->find($id);

        if (empty($clientUsers)) {
            return $this->sendError('Client Users not found');
        }

        $clientUsers->delete();

        return $this->sendResponse($id, 'Client Users deleted successfully');
    }
}
