<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createadmin_reset_passwordsRequest;
use App\Http\Requests\Updateadmin_reset_passwordsRequest;
use App\Repositories\admin_reset_passwordsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class admin_reset_passwordsController extends AppBaseController
{
    /** @var  admin_reset_passwordsRepository */
    private $adminResetPasswordsRepository;

    public function __construct(admin_reset_passwordsRepository $adminResetPasswordsRepo)
    {
        $this->adminResetPasswordsRepository = $adminResetPasswordsRepo;
    }

    /**
     * Display a listing of the admin_reset_passwords.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $adminResetPasswords = $this->adminResetPasswordsRepository->all();

        return view('admin_reset_passwords.index')
            ->with('adminResetPasswords', $adminResetPasswords);
    }

    /**
     * Show the form for creating a new admin_reset_passwords.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin_reset_passwords.create');
    }

    /**
     * Store a newly created admin_reset_passwords in storage.
     *
     * @param Createadmin_reset_passwordsRequest $request
     *
     * @return Response
     */
    public function store(Createadmin_reset_passwordsRequest $request)
    {
        $input = $request->all();

        $adminResetPasswords = $this->adminResetPasswordsRepository->create($input);

        Flash::success('Admin Reset Passwords saved successfully.');

        return redirect(route('adminResetPasswords.index'));
    }

    /**
     * Display the specified admin_reset_passwords.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $adminResetPasswords = $this->adminResetPasswordsRepository->find($id);

        if (empty($adminResetPasswords)) {
            Flash::error('Admin Reset Passwords not found');

            return redirect(route('adminResetPasswords.index'));
        }

        return view('admin_reset_passwords.show')->with('adminResetPasswords', $adminResetPasswords);
    }

    /**
     * Show the form for editing the specified admin_reset_passwords.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $adminResetPasswords = $this->adminResetPasswordsRepository->find($id);

        if (empty($adminResetPasswords)) {
            Flash::error('Admin Reset Passwords not found');

            return redirect(route('adminResetPasswords.index'));
        }

        return view('admin_reset_passwords.edit')->with('adminResetPasswords', $adminResetPasswords);
    }

    /**
     * Update the specified admin_reset_passwords in storage.
     *
     * @param int $id
     * @param Updateadmin_reset_passwordsRequest $request
     *
     * @return Response
     */
    public function update($id, Updateadmin_reset_passwordsRequest $request)
    {
        $adminResetPasswords = $this->adminResetPasswordsRepository->find($id);

        if (empty($adminResetPasswords)) {
            Flash::error('Admin Reset Passwords not found');

            return redirect(route('adminResetPasswords.index'));
        }

        $adminResetPasswords = $this->adminResetPasswordsRepository->update($request->all(), $id);

        Flash::success('Admin Reset Passwords updated successfully.');

        return redirect(route('adminResetPasswords.index'));
    }

    /**
     * Remove the specified admin_reset_passwords from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $adminResetPasswords = $this->adminResetPasswordsRepository->find($id);

        if (empty($adminResetPasswords)) {
            Flash::error('Admin Reset Passwords not found');

            return redirect(route('adminResetPasswords.index'));
        }

        $this->adminResetPasswordsRepository->delete($id);

        Flash::success('Admin Reset Passwords deleted successfully.');

        return redirect(route('adminResetPasswords.index'));
    }
}
