<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createclient_usersRequest;
use App\Http\Requests\Updateclient_usersRequest;
use App\Repositories\client_usersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class client_usersController extends AppBaseController
{
    /** @var  client_usersRepository */
    private $clientUsersRepository;

    public function __construct(client_usersRepository $clientUsersRepo)
    {
        $this->clientUsersRepository = $clientUsersRepo;
    }

    /**
     * Display a listing of the client_users.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $clientUsers = $this->clientUsersRepository->all();

        return view('client_users.index')
            ->with('clientUsers', $clientUsers);
    }

    /**
     * Show the form for creating a new client_users.
     *
     * @return Response
     */
    public function create()
    {
        return view('client_users.create');
    }

    /**
     * Store a newly created client_users in storage.
     *
     * @param Createclient_usersRequest $request
     *
     * @return Response
     */
    public function store(Createclient_usersRequest $request)
    {
        $input = $request->all();

        $clientUsers = $this->clientUsersRepository->create($input);

        Flash::success('Client Users saved successfully.');

        return redirect(route('clientUsers.index'));
    }

    /**
     * Display the specified client_users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clientUsers = $this->clientUsersRepository->find($id);

        if (empty($clientUsers)) {
            Flash::error('Client Users not found');

            return redirect(route('clientUsers.index'));
        }

        return view('client_users.show')->with('clientUsers', $clientUsers);
    }

    /**
     * Show the form for editing the specified client_users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clientUsers = $this->clientUsersRepository->find($id);

        if (empty($clientUsers)) {
            Flash::error('Client Users not found');

            return redirect(route('clientUsers.index'));
        }

        return view('client_users.edit')->with('clientUsers', $clientUsers);
    }

    /**
     * Update the specified client_users in storage.
     *
     * @param int $id
     * @param Updateclient_usersRequest $request
     *
     * @return Response
     */
    public function update($id, Updateclient_usersRequest $request)
    {
        $clientUsers = $this->clientUsersRepository->find($id);

        if (empty($clientUsers)) {
            Flash::error('Client Users not found');

            return redirect(route('clientUsers.index'));
        }

        $clientUsers = $this->clientUsersRepository->update($request->all(), $id);

        Flash::success('Client Users updated successfully.');

        return redirect(route('clientUsers.index'));
    }

    /**
     * Remove the specified client_users from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clientUsers = $this->clientUsersRepository->find($id);

        if (empty($clientUsers)) {
            Flash::error('Client Users not found');

            return redirect(route('clientUsers.index'));
        }

        $this->clientUsersRepository->delete($id);

        Flash::success('Client Users deleted successfully.');

        return redirect(route('clientUsers.index'));
    }

}
