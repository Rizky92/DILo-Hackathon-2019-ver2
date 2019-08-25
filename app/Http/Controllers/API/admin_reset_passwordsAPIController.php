<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createadmin_reset_passwordsAPIRequest;
use App\Http\Requests\API\Updateadmin_reset_passwordsAPIRequest;
use App\Models\admin_reset_passwords;
use App\Repositories\admin_reset_passwordsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class admin_reset_passwordsController
 * @package App\Http\Controllers\API
 */

class admin_reset_passwordsAPIController extends AppBaseController
{
    /** @var  admin_reset_passwordsRepository */
    private $adminResetPasswordsRepository;

    public function __construct(admin_reset_passwordsRepository $adminResetPasswordsRepo)
    {
        $this->adminResetPasswordsRepository = $adminResetPasswordsRepo;
    }

    /**
     * Display a listing of the admin_reset_passwords.
     * GET|HEAD /adminResetPasswords
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $adminResetPasswords = $this->adminResetPasswordsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($adminResetPasswords->toArray(), 'Admin Reset Passwords retrieved successfully');
    }

    /**
     * Store a newly created admin_reset_passwords in storage.
     * POST /adminResetPasswords
     *
     * @param Createadmin_reset_passwordsAPIRequest $request
     *
     * @return Response
     */
    public function store(Createadmin_reset_passwordsAPIRequest $request)
    {
        $input = $request->all();

        $adminResetPasswords = $this->adminResetPasswordsRepository->create($input);

        return $this->sendResponse($adminResetPasswords->toArray(), 'Admin Reset Passwords saved successfully');
    }

    /**
     * Display the specified admin_reset_passwords.
     * GET|HEAD /adminResetPasswords/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var admin_reset_passwords $adminResetPasswords */
        $adminResetPasswords = $this->adminResetPasswordsRepository->find($id);

        if (empty($adminResetPasswords)) {
            return $this->sendError('Admin Reset Passwords not found');
        }

        return $this->sendResponse($adminResetPasswords->toArray(), 'Admin Reset Passwords retrieved successfully');
    }

    /**
     * Update the specified admin_reset_passwords in storage.
     * PUT/PATCH /adminResetPasswords/{id}
     *
     * @param int $id
     * @param Updateadmin_reset_passwordsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateadmin_reset_passwordsAPIRequest $request)
    {
        $input = $request->all();

        /** @var admin_reset_passwords $adminResetPasswords */
        $adminResetPasswords = $this->adminResetPasswordsRepository->find($id);

        if (empty($adminResetPasswords)) {
            return $this->sendError('Admin Reset Passwords not found');
        }

        $adminResetPasswords = $this->adminResetPasswordsRepository->update($input, $id);

        return $this->sendResponse($adminResetPasswords->toArray(), 'admin_reset_passwords updated successfully');
    }

    /**
     * Remove the specified admin_reset_passwords from storage.
     * DELETE /adminResetPasswords/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var admin_reset_passwords $adminResetPasswords */
        $adminResetPasswords = $this->adminResetPasswordsRepository->find($id);

        if (empty($adminResetPasswords)) {
            return $this->sendError('Admin Reset Passwords not found');
        }

        $adminResetPasswords->delete();

        return $this->sendResponse($id, 'Admin Reset Passwords deleted successfully');
    }
}
