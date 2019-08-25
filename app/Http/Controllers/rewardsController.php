<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreaterewardsRequest;
use App\Http\Requests\UpdaterewardsRequest;
use App\Repositories\rewardsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class rewardsController extends AppBaseController
{
    /** @var  rewardsRepository */
    private $rewardsRepository;

    public function __construct(rewardsRepository $rewardsRepo)
    {
        $this->rewardsRepository = $rewardsRepo;
    }

    /**
     * Display a listing of the rewards.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $rewards = $this->rewardsRepository->all();

        return view('rewards.index')
            ->with('rewards', $rewards);
    }

    /**
     * Show the form for creating a new rewards.
     *
     * @return Response
     */
    public function create()
    {
        return view('rewards.create');
    }

    /**
     * Store a newly created rewards in storage.
     *
     * @param CreaterewardsRequest $request
     *
     * @return Response
     */
    public function store(CreaterewardsRequest $request)
    {
        $input = $request->all();

        $rewards = $this->rewardsRepository->create($input);

        Flash::success('Rewards saved successfully.');

        return redirect(route('rewards.index'));
    }

    /**
     * Display the specified rewards.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rewards = $this->rewardsRepository->find($id);

        if (empty($rewards)) {
            Flash::error('Rewards not found');

            return redirect(route('rewards.index'));
        }

        return view('rewards.show')->with('rewards', $rewards);
    }

    /**
     * Show the form for editing the specified rewards.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rewards = $this->rewardsRepository->find($id);

        if (empty($rewards)) {
            Flash::error('Rewards not found');

            return redirect(route('rewards.index'));
        }

        return view('rewards.edit')->with('rewards', $rewards);
    }

    /**
     * Update the specified rewards in storage.
     *
     * @param int $id
     * @param UpdaterewardsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdaterewardsRequest $request)
    {
        $rewards = $this->rewardsRepository->find($id);

        if (empty($rewards)) {
            Flash::error('Rewards not found');

            return redirect(route('rewards.index'));
        }

        $rewards = $this->rewardsRepository->update($request->all(), $id);

        Flash::success('Rewards updated successfully.');

        return redirect(route('rewards.index'));
    }

    /**
     * Remove the specified rewards from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rewards = $this->rewardsRepository->find($id);

        if (empty($rewards)) {
            Flash::error('Rewards not found');

            return redirect(route('rewards.index'));
        }

        $this->rewardsRepository->delete($id);

        Flash::success('Rewards deleted successfully.');

        return redirect(route('rewards.index'));
    }
}
