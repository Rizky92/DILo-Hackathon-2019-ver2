<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateachievementsRequest;
use App\Http\Requests\UpdateachievementsRequest;
use App\Repositories\achievementsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class achievementsController extends AppBaseController
{
    /** @var  achievementsRepository */
    private $achievementsRepository;

    public function __construct(achievementsRepository $achievementsRepo)
    {
        $this->achievementsRepository = $achievementsRepo;
    }

    /**
     * Display a listing of the achievements.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $achievements = $this->achievementsRepository->all();

        return view('achievements.index')
            ->with('achievements', $achievements);
    }

    /**
     * Show the form for creating a new achievements.
     *
     * @return Response
     */
    public function create()
    {
        return view('achievements.create');
    }

    /**
     * Store a newly created achievements in storage.
     *
     * @param CreateachievementsRequest $request
     *
     * @return Response
     */
    public function store(CreateachievementsRequest $request)
    {
        $input = $request->all();

        $achievements = $this->achievementsRepository->create($input);

        Flash::success('Achievements saved successfully.');

        return redirect(route('achievements.index'));
    }

    /**
     * Display the specified achievements.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $achievements = $this->achievementsRepository->find($id);

        if (empty($achievements)) {
            Flash::error('Achievements not found');

            return redirect(route('achievements.index'));
        }

        return view('achievements.show')->with('achievements', $achievements);
    }

    /**
     * Show the form for editing the specified achievements.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $achievements = $this->achievementsRepository->find($id);

        if (empty($achievements)) {
            Flash::error('Achievements not found');

            return redirect(route('achievements.index'));
        }

        return view('achievements.edit')->with('achievements', $achievements);
    }

    /**
     * Update the specified achievements in storage.
     *
     * @param int $id
     * @param UpdateachievementsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateachievementsRequest $request)
    {
        $achievements = $this->achievementsRepository->find($id);

        if (empty($achievements)) {
            Flash::error('Achievements not found');

            return redirect(route('achievements.index'));
        }

        $achievements = $this->achievementsRepository->update($request->all(), $id);

        Flash::success('Achievements updated successfully.');

        return redirect(route('achievements.index'));
    }

    /**
     * Remove the specified achievements from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $achievements = $this->achievementsRepository->find($id);

        if (empty($achievements)) {
            Flash::error('Achievements not found');

            return redirect(route('achievements.index'));
        }

        $this->achievementsRepository->delete($id);

        Flash::success('Achievements deleted successfully.');

        return redirect(route('achievements.index'));
    }
}
