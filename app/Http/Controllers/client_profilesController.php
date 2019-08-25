<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createclient_profilesRequest;
use App\Http\Requests\Updateclient_profilesRequest;
use App\Repositories\client_profilesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class client_profilesController extends AppBaseController
{
    /** @var  client_profilesRepository */
    private $clientProfilesRepository;

    public function __construct(client_profilesRepository $clientProfilesRepo)
    {
        $this->clientProfilesRepository = $clientProfilesRepo;
    }

    /**
     * Display a listing of the client_profiles.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $clientProfiles = $this->clientProfilesRepository->all();

        return view('client_profiles.index')
            ->with('clientProfiles', $clientProfiles);
    }

    /**
     * Show the form for creating a new client_profiles.
     *
     * @return Response
     */
    public function create()
    {
        return view('client_profiles.create');
    }

    /**
     * Store a newly created client_profiles in storage.
     *
     * @param Createclient_profilesRequest $request
     *
     * @return Response
     */
    public function store(Createclient_profilesRequest $request)
    {
        $input = $request->all();

        $clientProfiles = $this->clientProfilesRepository->create($input);

        Flash::success('Client Profiles saved successfully.');

        return redirect(route('clientProfiles.index'));
    }

    /**
     * Display the specified client_profiles.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clientProfiles = $this->clientProfilesRepository->find($id);

        if (empty($clientProfiles)) {
            Flash::error('Client Profiles not found');

            return redirect(route('clientProfiles.index'));
        }

        return view('client_profiles.show')->with('clientProfiles', $clientProfiles);
    }

    /**
     * Show the form for editing the specified client_profiles.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clientProfiles = $this->clientProfilesRepository->find($id);

        if (empty($clientProfiles)) {
            Flash::error('Client Profiles not found');

            return redirect(route('clientProfiles.index'));
        }

        return view('client_profiles.edit')->with('clientProfiles', $clientProfiles);
    }

    /**
     * Update the specified client_profiles in storage.
     *
     * @param int $id
     * @param Updateclient_profilesRequest $request
     *
     * @return Response
     */
    public function update($id, Updateclient_profilesRequest $request)
    {
        $clientProfiles = $this->clientProfilesRepository->find($id);

        if (empty($clientProfiles)) {
            Flash::error('Client Profiles not found');

            return redirect(route('clientProfiles.index'));
        }

        $clientProfiles = $this->clientProfilesRepository->update($request->all(), $id);

        Flash::success('Client Profiles updated successfully.');

        return redirect(route('clientProfiles.index'));
    }

    /**
     * Remove the specified client_profiles from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clientProfiles = $this->clientProfilesRepository->find($id);

        if (empty($clientProfiles)) {
            Flash::error('Client Profiles not found');

            return redirect(route('clientProfiles.index'));
        }

        $this->clientProfilesRepository->delete($id);

        Flash::success('Client Profiles deleted successfully.');

        return redirect(route('clientProfiles.index'));
    }
}
