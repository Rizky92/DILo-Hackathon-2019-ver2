<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createtourism_serv_prod_categoriesAPIRequest;
use App\Http\Requests\API\Updatetourism_serv_prod_categoriesAPIRequest;
use App\Models\tourism_serv_prod_categories;
use App\Repositories\tourism_serv_prod_categoriesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class tourism_serv_prod_categoriesController
 * @package App\Http\Controllers\API
 */

class tourism_serv_prod_categoriesAPIController extends AppBaseController
{
    /** @var  tourism_serv_prod_categoriesRepository */
    private $tourismServProdCategoriesRepository;

    public function __construct(tourism_serv_prod_categoriesRepository $tourismServProdCategoriesRepo)
    {
        $this->tourismServProdCategoriesRepository = $tourismServProdCategoriesRepo;
    }

    /**
     * Display a listing of the tourism_serv_prod_categories.
     * GET|HEAD /tourismServProdCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tourismServProdCategories = $this->tourismServProdCategoriesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tourismServProdCategories->toArray(), 'Tourism Serv Prod Categories retrieved successfully');
    }

    /**
     * Store a newly created tourism_serv_prod_categories in storage.
     * POST /tourismServProdCategories
     *
     * @param Createtourism_serv_prod_categoriesAPIRequest $request
     *
     * @return Response
     */
    public function store(Createtourism_serv_prod_categoriesAPIRequest $request)
    {
        $input = $request->all();

        $tourismServProdCategories = $this->tourismServProdCategoriesRepository->create($input);

        return $this->sendResponse($tourismServProdCategories->toArray(), 'Tourism Serv Prod Categories saved successfully');
    }

    /**
     * Display the specified tourism_serv_prod_categories.
     * GET|HEAD /tourismServProdCategories/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var tourism_serv_prod_categories $tourismServProdCategories */
        $tourismServProdCategories = $this->tourismServProdCategoriesRepository->find($id);

        if (empty($tourismServProdCategories)) {
            return $this->sendError('Tourism Serv Prod Categories not found');
        }

        return $this->sendResponse($tourismServProdCategories->toArray(), 'Tourism Serv Prod Categories retrieved successfully');
    }

    /**
     * Update the specified tourism_serv_prod_categories in storage.
     * PUT/PATCH /tourismServProdCategories/{id}
     *
     * @param int $id
     * @param Updatetourism_serv_prod_categoriesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetourism_serv_prod_categoriesAPIRequest $request)
    {
        $input = $request->all();

        /** @var tourism_serv_prod_categories $tourismServProdCategories */
        $tourismServProdCategories = $this->tourismServProdCategoriesRepository->find($id);

        if (empty($tourismServProdCategories)) {
            return $this->sendError('Tourism Serv Prod Categories not found');
        }

        $tourismServProdCategories = $this->tourismServProdCategoriesRepository->update($input, $id);

        return $this->sendResponse($tourismServProdCategories->toArray(), 'tourism_serv_prod_categories updated successfully');
    }

    /**
     * Remove the specified tourism_serv_prod_categories from storage.
     * DELETE /tourismServProdCategories/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var tourism_serv_prod_categories $tourismServProdCategories */
        $tourismServProdCategories = $this->tourismServProdCategoriesRepository->find($id);

        if (empty($tourismServProdCategories)) {
            return $this->sendError('Tourism Serv Prod Categories not found');
        }

        $tourismServProdCategories->delete();

        return $this->sendResponse($id, 'Tourism Serv Prod Categories deleted successfully');
    }
}
