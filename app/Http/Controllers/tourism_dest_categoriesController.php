<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createtourism_dest_categoriesRequest;
use App\Http\Requests\Updatetourism_dest_categoriesRequest;
use App\Repositories\tourism_dest_categoriesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tourism_dest_categoriesController extends AppBaseController
{
    /** @var  tourism_dest_categoriesRepository */
    private $tourismDestCategoriesRepository;

    public function __construct(tourism_dest_categoriesRepository $tourismDestCategoriesRepo)
    {
        $this->tourismDestCategoriesRepository = $tourismDestCategoriesRepo;
    }

    /**
     * Display a listing of the tourism_dest_categories.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tourismDestCategories = $this->tourismDestCategoriesRepository->all();

        return view('tourism_dest_categories.index')
            ->with('tourismDestCategories', $tourismDestCategories);
    }

    /**
     * Show the form for creating a new tourism_dest_categories.
     *
     * @return Response
     */
    public function create()
    {
        return view('tourism_dest_categories.create');
    }

    /**
     * Store a newly created tourism_dest_categories in storage.
     *
     * @param Createtourism_dest_categoriesRequest $request
     *
     * @return Response
     */
    public function store(Createtourism_dest_categoriesRequest $request)
    {
        $input = $request->all();

        $tourismDestCategories = $this->tourismDestCategoriesRepository->create($input);

        Flash::success('Tourism Dest Categories saved successfully.');

        return redirect(route('tourismDestCategories.index'));
    }

    /**
     * Display the specified tourism_dest_categories.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tourismDestCategories = $this->tourismDestCategoriesRepository->find($id);

        if (empty($tourismDestCategories)) {
            Flash::error('Tourism Dest Categories not found');

            return redirect(route('tourismDestCategories.index'));
        }

        return view('tourism_dest_categories.show')->with('tourismDestCategories', $tourismDestCategories);
    }

    /**
     * Show the form for editing the specified tourism_dest_categories.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tourismDestCategories = $this->tourismDestCategoriesRepository->find($id);

        if (empty($tourismDestCategories)) {
            Flash::error('Tourism Dest Categories not found');

            return redirect(route('tourismDestCategories.index'));
        }

        return view('tourism_dest_categories.edit')->with('tourismDestCategories', $tourismDestCategories);
    }

    /**
     * Update the specified tourism_dest_categories in storage.
     *
     * @param int $id
     * @param Updatetourism_dest_categoriesRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetourism_dest_categoriesRequest $request)
    {
        $tourismDestCategories = $this->tourismDestCategoriesRepository->find($id);

        if (empty($tourismDestCategories)) {
            Flash::error('Tourism Dest Categories not found');

            return redirect(route('tourismDestCategories.index'));
        }

        $tourismDestCategories = $this->tourismDestCategoriesRepository->update($request->all(), $id);

        Flash::success('Tourism Dest Categories updated successfully.');

        return redirect(route('tourismDestCategories.index'));
    }

    /**
     * Remove the specified tourism_dest_categories from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tourismDestCategories = $this->tourismDestCategoriesRepository->find($id);

        if (empty($tourismDestCategories)) {
            Flash::error('Tourism Dest Categories not found');

            return redirect(route('tourismDestCategories.index'));
        }

        $this->tourismDestCategoriesRepository->delete($id);

        Flash::success('Tourism Dest Categories deleted successfully.');

        return redirect(route('tourismDestCategories.index'));
    }
}
