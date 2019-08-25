<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createinvestor_profilesAPIRequest;
use App\Http\Requests\API\Updateinvestor_profilesAPIRequest;
use App\Models\investor_profiles;
use App\Repositories\investor_profilesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class investor_profilesController
 * @package App\Http\Controllers\API
 */

class investor_profilesAPIController extends AppBaseController
{
    /** @var  investor_profilesRepository */
    private $investorProfilesRepository;

    public function __construct(investor_profilesRepository $investorProfilesRepo)
    {
        $this->investorProfilesRepository = $investorProfilesRepo;
    }

    /**
     * Display a listing of the investor_profiles.
     * GET|HEAD /investorProfiles
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $investorProfiles = $this->investorProfilesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($investorProfiles->toArray(), 'Investor Profiles retrieved successfully');
    }

    /**
     * Store a newly created investor_profiles in storage.
     * POST /investorProfiles
     *
     * @param Createinvestor_profilesAPIRequest $request
     *
     * @return Response
     */
    public function store(Createinvestor_profilesAPIRequest $request)
    {
        $input = $request->all();

        $investorProfiles = $this->investorProfilesRepository->create($input);

        return $this->sendResponse($investorProfiles->toArray(), 'Investor Profiles saved successfully');
    }

    /**
     * Display the specified investor_profiles.
     * GET|HEAD /investorProfiles/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var investor_profiles $investorProfiles */
        $investorProfiles = $this->investorProfilesRepository->find($id);

        if (empty($investorProfiles)) {
            return $this->sendError('Investor Profiles not found');
        }

        return $this->sendResponse($investorProfiles->toArray(), 'Investor Profiles retrieved successfully');
    }

    /**
     * Update the specified investor_profiles in storage.
     * PUT/PATCH /investorProfiles/{id}
     *
     * @param int $id
     * @param Updateinvestor_profilesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateinvestor_profilesAPIRequest $request)
    {
        $input = $request->all();

        /** @var investor_profiles $investorProfiles */
        $investorProfiles = $this->investorProfilesRepository->find($id);

        if (empty($investorProfiles)) {
            return $this->sendError('Investor Profiles not found');
        }

        $investorProfiles = $this->investorProfilesRepository->update($input, $id);

        return $this->sendResponse($investorProfiles->toArray(), 'investor_profiles updated successfully');
    }

    /**
     * Remove the specified investor_profiles from storage.
     * DELETE /investorProfiles/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var investor_profiles $investorProfiles */
        $investorProfiles = $this->investorProfilesRepository->find($id);

        if (empty($investorProfiles)) {
            return $this->sendError('Investor Profiles not found');
        }

        $investorProfiles->delete();

        return $this->sendResponse($id, 'Investor Profiles deleted successfully');
    }
}
