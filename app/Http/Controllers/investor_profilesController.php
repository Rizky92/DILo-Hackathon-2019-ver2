<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createinvestor_profilesRequest;
use App\Http\Requests\Updateinvestor_profilesRequest;
use App\Repositories\investor_profilesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class investor_profilesController extends AppBaseController
{
    /** @var  investor_profilesRepository */
    private $investorProfilesRepository;

    public function __construct(investor_profilesRepository $investorProfilesRepo)
    {
        $this->investorProfilesRepository = $investorProfilesRepo;
    }

    /**
     * Display a listing of the investor_profiles.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $investorProfiles = $this->investorProfilesRepository->all();

        return view('investor_profiles.index')
            ->with('investorProfiles', $investorProfiles);
    }

    /**
     * Show the form for creating a new investor_profiles.
     *
     * @return Response
     */
    public function create()
    {
        return view('investor_profiles.create');
    }

    /**
     * Store a newly created investor_profiles in storage.
     *
     * @param Createinvestor_profilesRequest $request
     *
     * @return Response
     */
    public function store(Createinvestor_profilesRequest $request)
    {
        $input = $request->all();

        $investorProfiles = $this->investorProfilesRepository->create($input);

        Flash::success('Investor Profiles saved successfully.');

        return redirect(route('investorProfiles.index'));
    }

    /**
     * Display the specified investor_profiles.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $investorProfiles = $this->investorProfilesRepository->find($id);

        if (empty($investorProfiles)) {
            Flash::error('Investor Profiles not found');

            return redirect(route('investorProfiles.index'));
        }

        return view('investor_profiles.show')->with('investorProfiles', $investorProfiles);
    }

    /**
     * Show the form for editing the specified investor_profiles.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $investorProfiles = $this->investorProfilesRepository->find($id);

        if (empty($investorProfiles)) {
            Flash::error('Investor Profiles not found');

            return redirect(route('investorProfiles.index'));
        }

        return view('investor_profiles.edit')->with('investorProfiles', $investorProfiles);
    }

    /**
     * Update the specified investor_profiles in storage.
     *
     * @param int $id
     * @param Updateinvestor_profilesRequest $request
     *
     * @return Response
     */
    public function update($id, Updateinvestor_profilesRequest $request)
    {
        $investorProfiles = $this->investorProfilesRepository->find($id);

        if (empty($investorProfiles)) {
            Flash::error('Investor Profiles not found');

            return redirect(route('investorProfiles.index'));
        }

        $investorProfiles = $this->investorProfilesRepository->update($request->all(), $id);

        Flash::success('Investor Profiles updated successfully.');

        return redirect(route('investorProfiles.index'));
    }

    /**
     * Remove the specified investor_profiles from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $investorProfiles = $this->investorProfilesRepository->find($id);

        if (empty($investorProfiles)) {
            Flash::error('Investor Profiles not found');

            return redirect(route('investorProfiles.index'));
        }

        $this->investorProfilesRepository->delete($id);

        Flash::success('Investor Profiles deleted successfully.');

        return redirect(route('investorProfiles.index'));
    }
}
