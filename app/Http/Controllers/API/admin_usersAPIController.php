<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createadmin_usersAPIRequest;
use App\Http\Requests\API\Updateadmin_usersAPIRequest;
use App\Models\admin_users;
use App\Repositories\admin_usersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class admin_usersController
 * @package App\Http\Controllers\API
 */

class admin_usersAPIController extends AppBaseController
{
    /** @var  admin_usersRepository */
    private $adminUsersRepository;

    public function __construct(admin_usersRepository $adminUsersRepo)
    {
        $this->adminUsersRepository = $adminUsersRepo;
    }

    /**
     * Display a listing of the admin_users.
     * GET|HEAD /adminUsers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $adminUsers = $this->adminUsersRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($adminUsers->toArray(), 'Admin Users retrieved successfully');
    }

    /**
     * Store a newly created admin_users in storage.
     * POST /adminUsers
     *
     * @param Createadmin_usersAPIRequest $request
     *
     * @return Response
     */
    public function store(Createadmin_usersAPIRequest $request)
    {
        $input = $request->all();

        $adminUsers = $this->adminUsersRepository->create($input);

        return $this->sendResponse($adminUsers->toArray(), 'Admin Users saved successfully');
    }

    /**
     * Display the specified admin_users.
     * GET|HEAD /adminUsers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var admin_users $adminUsers */
        $adminUsers = $this->adminUsersRepository->find($id);

        if (empty($adminUsers)) {
            return $this->sendError('Admin Users not found');
        }

        return $this->sendResponse($adminUsers->toArray(), 'Admin Users retrieved successfully');
    }

    /**
     * Update the specified admin_users in storage.
     * PUT/PATCH /adminUsers/{id}
     *
     * @param int $id
     * @param Updateadmin_usersAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateadmin_usersAPIRequest $request)
    {
        $input = $request->all();

        /** @var admin_users $adminUsers */
        $adminUsers = $this->adminUsersRepository->find($id);

        if (empty($adminUsers)) {
            return $this->sendError('Admin Users not found');
        }

        $adminUsers = $this->adminUsersRepository->update($input, $id);

        return $this->sendResponse($adminUsers->toArray(), 'admin_users updated successfully');
    }

    /**
     * Remove the specified admin_users from storage.
     * DELETE /adminUsers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var admin_users $adminUsers */
        $adminUsers = $this->adminUsersRepository->find($id);

        if (empty($adminUsers)) {
            return $this->sendError('Admin Users not found');
        }

        $adminUsers->delete();

        return $this->sendResponse($id, 'Admin Users deleted successfully');
    }
}
