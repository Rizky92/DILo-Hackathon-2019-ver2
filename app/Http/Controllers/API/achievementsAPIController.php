<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateachievementsAPIRequest;
use App\Http\Requests\API\UpdateachievementsAPIRequest;
use App\Models\achievements;
use App\Repositories\achievementsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class achievementsController
 * @package App\Http\Controllers\API
 */

class achievementsAPIController extends AppBaseController
{
    /** @var  achievementsRepository */
    private $achievementsRepository;

    public function __construct(achievementsRepository $achievementsRepo)
    {
        $this->achievementsRepository = $achievementsRepo;
    }

    /**
     * Display a listing of the achievements.
     * GET|HEAD /achievements
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $achievements = $this->achievementsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($achievements->toArray(), 'Achievements retrieved successfully');
    }

    /**
     * Store a newly created achievements in storage.
     * POST /achievements
     *
     * @param CreateachievementsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateachievementsAPIRequest $request)
    {
        $input = $request->all();

        $achievements = $this->achievementsRepository->create($input);

        return $this->sendResponse($achievements->toArray(), 'Achievements saved successfully');
    }

    /**
     * Display the specified achievements.
     * GET|HEAD /achievements/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var achievements $achievements */
        $achievements = $this->achievementsRepository->find($id);

        if (empty($achievements)) {
            return $this->sendError('Achievements not found');
        }

        return $this->sendResponse($achievements->toArray(), 'Achievements retrieved successfully');
    }

    /**
     * Update the specified achievements in storage.
     * PUT/PATCH /achievements/{id}
     *
     * @param int $id
     * @param UpdateachievementsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateachievementsAPIRequest $request)
    {
        $input = $request->all();

        /** @var achievements $achievements */
        $achievements = $this->achievementsRepository->find($id);

        if (empty($achievements)) {
            return $this->sendError('Achievements not found');
        }

        $achievements = $this->achievementsRepository->update($input, $id);

        return $this->sendResponse($achievements->toArray(), 'achievements updated successfully');
    }

    /**
     * Remove the specified achievements from storage.
     * DELETE /achievements/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var achievements $achievements */
        $achievements = $this->achievementsRepository->find($id);

        if (empty($achievements)) {
            return $this->sendError('Achievements not found');
        }

        $achievements->delete();

        return $this->sendResponse($id, 'Achievements deleted successfully');
    }
}
