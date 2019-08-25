<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createtourism_dest_categoriesAPIRequest;
use App\Http\Requests\API\Updatetourism_dest_categoriesAPIRequest;
use App\Models\tourism_dest_categories;
use App\Repositories\tourism_dest_categoriesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class tourism_dest_categoriesController
 * @package App\Http\Controllers\API
 */

class tourism_dest_categoriesAPIController extends AppBaseController
{
    /** @var  tourism_dest_categoriesRepository */
    private $tourismDestCategoriesRepository;

    public function __construct(tourism_dest_categoriesRepository $tourismDestCategoriesRepo)
    {
        $this->tourismDestCategoriesRepository = $tourismDestCategoriesRepo;
    }

    /**
     * Display a listing of the tourism_dest_categories.
     * GET|HEAD /tourismDestCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tourismDestCategories = $this->tourismDestCategoriesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tourismDestCategories->toArray(), 'Tourism Dest Categories retrieved successfully');
    }

    /**
     * Store a newly created tourism_dest_categories in storage.
     * POST /tourismDestCategories
     *
     * @param Createtourism_dest_categoriesAPIRequest $request
     *
     * @return Response
     */
    public function store(Createtourism_dest_categoriesAPIRequest $request)
    {
        $input = $request->all();

        $tourismDestCategories = $this->tourismDestCategoriesRepository->create($input);

        return $this->sendResponse($tourismDestCategories->toArray(), 'Tourism Dest Categories saved successfully');
    }

    /**
     * Display the specified tourism_dest_categories.
     * GET|HEAD /tourismDestCategories/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var tourism_dest_categories $tourismDestCategories */
        $tourismDestCategories = $this->tourismDestCategoriesRepository->find($id);

        if (empty($tourismDestCategories)) {
            return $this->sendError('Tourism Dest Categories not found');
        }

        return $this->sendResponse($tourismDestCategories->toArray(), 'Tourism Dest Categories retrieved successfully');
    }

    /**
     * Update the specified tourism_dest_categories in storage.
     * PUT/PATCH /tourismDestCategories/{id}
     *
     * @param int $id
     * @param Updatetourism_dest_categoriesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetourism_dest_categoriesAPIRequest $request)
    {
        $input = $request->all();

        /** @var tourism_dest_categories $tourismDestCategories */
        $tourismDestCategories = $this->tourismDestCategoriesRepository->find($id);

        if (empty($tourismDestCategories)) {
            return $this->sendError('Tourism Dest Categories not found');
        }

        $tourismDestCategories = $this->tourismDestCategoriesRepository->update($input, $id);

        return $this->sendResponse($tourismDestCategories->toArray(), 'tourism_dest_categories updated successfully');
    }

    /**
     * Remove the specified tourism_dest_categories from storage.
     * DELETE /tourismDestCategories/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var tourism_dest_categories $tourismDestCategories */
        $tourismDestCategories = $this->tourismDestCategoriesRepository->find($id);

        if (empty($tourismDestCategories)) {
            return $this->sendError('Tourism Dest Categories not found');
        }

        $tourismDestCategories->delete();

        return $this->sendResponse($id, 'Tourism Dest Categories deleted successfully');
    }
}
