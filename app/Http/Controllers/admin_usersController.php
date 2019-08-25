<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createadmin_usersRequest;
use App\Http\Requests\Updateadmin_usersRequest;
use App\Repositories\admin_usersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class admin_usersController extends AppBaseController
{
    /** @var  admin_usersRepository */
    private $adminUsersRepository;

    public function __construct(admin_usersRepository $adminUsersRepo)
    {
        $this->adminUsersRepository = $adminUsersRepo;
    }

    /**
     * Display a listing of the admin_users.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $adminUsers = $this->adminUsersRepository->all();

        return view('admin_users.index')
            ->with('adminUsers', $adminUsers);
    }

    /**
     * Show the form for creating a new admin_users.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin_users.create');
    }

    /**
     * Store a newly created admin_users in storage.
     *
     * @param Createadmin_usersRequest $request
     *
     * @return Response
     */
    public function store(Createadmin_usersRequest $request)
    {
        $input = $request->all();

        $adminUsers = $this->adminUsersRepository->create($input);

        Flash::success('Admin Users saved successfully.');

        return redirect(route('adminUsers.index'));
    }

    /**
     * Display the specified admin_users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $adminUsers = $this->adminUsersRepository->find($id);

        if (empty($adminUsers)) {
            Flash::error('Admin Users not found');

            return redirect(route('adminUsers.index'));
        }

        return view('admin_users.show')->with('adminUsers', $adminUsers);
    }

    /**
     * Show the form for editing the specified admin_users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $adminUsers = $this->adminUsersRepository->find($id);

        if (empty($adminUsers)) {
            Flash::error('Admin Users not found');

            return redirect(route('adminUsers.index'));
        }

        return view('admin_users.edit')->with('adminUsers', $adminUsers);
    }

    /**
     * Update the specified admin_users in storage.
     *
     * @param int $id
     * @param Updateadmin_usersRequest $request
     *
     * @return Response
     */
    public function update($id, Updateadmin_usersRequest $request)
    {
        $adminUsers = $this->adminUsersRepository->find($id);

        if (empty($adminUsers)) {
            Flash::error('Admin Users not found');

            return redirect(route('adminUsers.index'));
        }

        $adminUsers = $this->adminUsersRepository->update($request->all(), $id);

        Flash::success('Admin Users updated successfully.');

        return redirect(route('adminUsers.index'));
    }

    /**
     * Remove the specified admin_users from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $adminUsers = $this->adminUsersRepository->find($id);

        if (empty($adminUsers)) {
            Flash::error('Admin Users not found');

            return redirect(route('adminUsers.index'));
        }

        $this->adminUsersRepository->delete($id);

        Flash::success('Admin Users deleted successfully.');

        return redirect(route('adminUsers.index'));
    }
}
