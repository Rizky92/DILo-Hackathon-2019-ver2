<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreaterewardsAPIRequest;
use App\Http\Requests\API\UpdaterewardsAPIRequest;
use App\Models\rewards;
use App\Repositories\rewardsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class rewardsController
 * @package App\Http\Controllers\API
 */

class rewardsAPIController extends AppBaseController
{
    /** @var  rewardsRepository */
    private $rewardsRepository;

    public function __construct(rewardsRepository $rewardsRepo)
    {
        $this->rewardsRepository = $rewardsRepo;
    }

    /**
     * Display a listing of the rewards.
     * GET|HEAD /rewards
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $rewards = $this->rewardsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($rewards->toArray(), 'Rewards retrieved successfully');
    }

    /**
     * Store a newly created rewards in storage.
     * POST /rewards
     *
     * @param CreaterewardsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreaterewardsAPIRequest $request)
    {
        $input = $request->all();

        $rewards = $this->rewardsRepository->create($input);

        return $this->sendResponse($rewards->toArray(), 'Rewards saved successfully');
    }

    /**
     * Display the specified rewards.
     * GET|HEAD /rewards/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var rewards $rewards */
        $rewards = $this->rewardsRepository->find($id);

        if (empty($rewards)) {
            return $this->sendError('Rewards not found');
        }

        return $this->sendResponse($rewards->toArray(), 'Rewards retrieved successfully');
    }

    /**
     * Update the specified rewards in storage.
     * PUT/PATCH /rewards/{id}
     *
     * @param int $id
     * @param UpdaterewardsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdaterewardsAPIRequest $request)
    {
        $input = $request->all();

        /** @var rewards $rewards */
        $rewards = $this->rewardsRepository->find($id);

        if (empty($rewards)) {
            return $this->sendError('Rewards not found');
        }

        $rewards = $this->rewardsRepository->update($input, $id);

        return $this->sendResponse($rewards->toArray(), 'rewards updated successfully');
    }

    /**
     * Remove the specified rewards from storage.
     * DELETE /rewards/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var rewards $rewards */
        $rewards = $this->rewardsRepository->find($id);

        if (empty($rewards)) {
            return $this->sendError('Rewards not found');
        }

        $rewards->delete();

        return $this->sendResponse($id, 'Rewards deleted successfully');
    }
}
