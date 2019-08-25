<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createtourism_event_categoriesRequest;
use App\Http\Requests\Updatetourism_event_categoriesRequest;
use App\Repositories\tourism_event_categoriesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tourism_event_categoriesController extends AppBaseController
{
    /** @var  tourism_event_categoriesRepository */
    private $tourismEventCategoriesRepository;

    public function __construct(tourism_event_categoriesRepository $tourismEventCategoriesRepo)
    {
        $this->tourismEventCategoriesRepository = $tourismEventCategoriesRepo;
    }

    /**
     * Display a listing of the tourism_event_categories.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tourismEventCategories = $this->tourismEventCategoriesRepository->all();

        return view('tourism_event_categories.index')
            ->with('tourismEventCategories', $tourismEventCategories);
    }

    /**
     * Show the form for creating a new tourism_event_categories.
     *
     * @return Response
     */
    public function create()
    {
        return view('tourism_event_categories.create');
    }

    /**
     * Store a newly created tourism_event_categories in storage.
     *
     * @param Createtourism_event_categoriesRequest $request
     *
     * @return Response
     */
    public function store(Createtourism_event_categoriesRequest $request)
    {
        $input = $request->all();

        $tourismEventCategories = $this->tourismEventCategoriesRepository->create($input);

        Flash::success('Tourism Event Categories saved successfully.');

        return redirect(route('tourismEventCategories.index'));
    }

    /**
     * Display the specified tourism_event_categories.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tourismEventCategories = $this->tourismEventCategoriesRepository->find($id);

        if (empty($tourismEventCategories)) {
            Flash::error('Tourism Event Categories not found');

            return redirect(route('tourismEventCategories.index'));
        }

        return view('tourism_event_categories.show')->with('tourismEventCategories', $tourismEventCategories);
    }

    /**
     * Show the form for editing the specified tourism_event_categories.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tourismEventCategories = $this->tourismEventCategoriesRepository->find($id);

        if (empty($tourismEventCategories)) {
            Flash::error('Tourism Event Categories not found');

            return redirect(route('tourismEventCategories.index'));
        }

        return view('tourism_event_categories.edit')->with('tourismEventCategories', $tourismEventCategories);
    }

    /**
     * Update the specified tourism_event_categories in storage.
     *
     * @param int $id
     * @param Updatetourism_event_categoriesRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetourism_event_categoriesRequest $request)
    {
        $tourismEventCategories = $this->tourismEventCategoriesRepository->find($id);

        if (empty($tourismEventCategories)) {
            Flash::error('Tourism Event Categories not found');

            return redirect(route('tourismEventCategories.index'));
        }

        $tourismEventCategories = $this->tourismEventCategoriesRepository->update($request->all(), $id);

        Flash::success('Tourism Event Categories updated successfully.');

        return redirect(route('tourismEventCategories.index'));
    }

    /**
     * Remove the specified tourism_event_categories from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tourismEventCategories = $this->tourismEventCategoriesRepository->find($id);

        if (empty($tourismEventCategories)) {
            Flash::error('Tourism Event Categories not found');

            return redirect(route('tourismEventCategories.index'));
        }

        $this->tourismEventCategoriesRepository->delete($id);

        Flash::success('Tourism Event Categories deleted successfully.');

        return redirect(route('tourismEventCategories.index'));
    }
}
