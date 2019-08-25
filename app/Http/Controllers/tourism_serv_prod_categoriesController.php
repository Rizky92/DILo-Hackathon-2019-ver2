<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createtourism_serv_prod_categoriesRequest;
use App\Http\Requests\Updatetourism_serv_prod_categoriesRequest;
use App\Repositories\tourism_serv_prod_categoriesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tourism_serv_prod_categoriesController extends AppBaseController
{
    /** @var  tourism_serv_prod_categoriesRepository */
    private $tourismServProdCategoriesRepository;

    public function __construct(tourism_serv_prod_categoriesRepository $tourismServProdCategoriesRepo)
    {
        $this->tourismServProdCategoriesRepository = $tourismServProdCategoriesRepo;
    }

    /**
     * Display a listing of the tourism_serv_prod_categories.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tourismServProdCategories = $this->tourismServProdCategoriesRepository->all();

        return view('tourism_serv_prod_categories.index')
            ->with('tourismServProdCategories', $tourismServProdCategories);
    }

    /**
     * Show the form for creating a new tourism_serv_prod_categories.
     *
     * @return Response
     */
    public function create()
    {
        return view('tourism_serv_prod_categories.create');
    }

    /**
     * Store a newly created tourism_serv_prod_categories in storage.
     *
     * @param Createtourism_serv_prod_categoriesRequest $request
     *
     * @return Response
     */
    public function store(Createtourism_serv_prod_categoriesRequest $request)
    {
        $input = $request->all();

        $tourismServProdCategories = $this->tourismServProdCategoriesRepository->create($input);

        Flash::success('Tourism Serv Prod Categories saved successfully.');

        return redirect(route('tourismServProdCategories.index'));
    }

    /**
     * Display the specified tourism_serv_prod_categories.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tourismServProdCategories = $this->tourismServProdCategoriesRepository->find($id);

        if (empty($tourismServProdCategories)) {
            Flash::error('Tourism Serv Prod Categories not found');

            return redirect(route('tourismServProdCategories.index'));
        }

        return view('tourism_serv_prod_categories.show')->with('tourismServProdCategories', $tourismServProdCategories);
    }

    /**
     * Show the form for editing the specified tourism_serv_prod_categories.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tourismServProdCategories = $this->tourismServProdCategoriesRepository->find($id);

        if (empty($tourismServProdCategories)) {
            Flash::error('Tourism Serv Prod Categories not found');

            return redirect(route('tourismServProdCategories.index'));
        }

        return view('tourism_serv_prod_categories.edit')->with('tourismServProdCategories', $tourismServProdCategories);
    }

    /**
     * Update the specified tourism_serv_prod_categories in storage.
     *
     * @param int $id
     * @param Updatetourism_serv_prod_categoriesRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetourism_serv_prod_categoriesRequest $request)
    {
        $tourismServProdCategories = $this->tourismServProdCategoriesRepository->find($id);

        if (empty($tourismServProdCategories)) {
            Flash::error('Tourism Serv Prod Categories not found');

            return redirect(route('tourismServProdCategories.index'));
        }

        $tourismServProdCategories = $this->tourismServProdCategoriesRepository->update($request->all(), $id);

        Flash::success('Tourism Serv Prod Categories updated successfully.');

        return redirect(route('tourismServProdCategories.index'));
    }

    /**
     * Remove the specified tourism_serv_prod_categories from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tourismServProdCategories = $this->tourismServProdCategoriesRepository->find($id);

        if (empty($tourismServProdCategories)) {
            Flash::error('Tourism Serv Prod Categories not found');

            return redirect(route('tourismServProdCategories.index'));
        }

        $this->tourismServProdCategoriesRepository->delete($id);

        Flash::success('Tourism Serv Prod Categories deleted successfully.');

        return redirect(route('tourismServProdCategories.index'));
    }
}
