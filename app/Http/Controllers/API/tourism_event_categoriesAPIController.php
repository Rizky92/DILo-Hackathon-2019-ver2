<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createtourism_event_categoriesAPIRequest;
use App\Http\Requests\API\Updatetourism_event_categoriesAPIRequest;
use App\Models\tourism_event_categories;
use App\Repositories\tourism_event_categoriesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class tourism_event_categoriesController
 * @package App\Http\Controllers\API
 */

class tourism_event_categoriesAPIController extends AppBaseController
{
    /** @var  tourism_event_categoriesRepository */
    private $tourismEventCategoriesRepository;

    public function __construct(tourism_event_categoriesRepository $tourismEventCategoriesRepo)
    {
        $this->tourismEventCategoriesRepository = $tourismEventCategoriesRepo;
    }

    /**
     * Display a listing of the tourism_event_categories.
     * GET|HEAD /tourismEventCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tourismEventCategories = $this->tourismEventCategoriesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tourismEventCategories->toArray(), 'Tourism Event Categories retrieved successfully');
    }

    /**
     * Store a newly created tourism_event_categories in storage.
     * POST /tourismEventCategories
     *
     * @param Createtourism_event_categoriesAPIRequest $request
     *
     * @return Response
     */
    public function store(Createtourism_event_categoriesAPIRequest $request)
    {
        $input = $request->all();

        $tourismEventCategories = $this->tourismEventCategoriesRepository->create($input);

        return $this->sendResponse($tourismEventCategories->toArray(), 'Tourism Event Categories saved successfully');
    }

    /**
     * Display the specified tourism_event_categories.
     * GET|HEAD /tourismEventCategories/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var tourism_event_categories $tourismEventCategories */
        $tourismEventCategories = $this->tourismEventCategoriesRepository->find($id);

        if (empty($tourismEventCategories)) {
            return $this->sendError('Tourism Event Categories not found');
        }

        return $this->sendResponse($tourismEventCategories->toArray(), 'Tourism Event Categories retrieved successfully');
    }

    /**
     * Update the specified tourism_event_categories in storage.
     * PUT/PATCH /tourismEventCategories/{id}
     *
     * @param int $id
     * @param Updatetourism_event_categoriesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetourism_event_categoriesAPIRequest $request)
    {
        $input = $request->all();

        /** @var tourism_event_categories $tourismEventCategories */
        $tourismEventCategories = $this->tourismEventCategoriesRepository->find($id);

        if (empty($tourismEventCategories)) {
            return $this->sendError('Tourism Event Categories not found');
        }

        $tourismEventCategories = $this->tourismEventCategoriesRepository->update($input, $id);

        return $this->sendResponse($tourismEventCategories->toArray(), 'tourism_event_categories updated successfully');
    }

    /**
     * Remove the specified tourism_event_categories from storage.
     * DELETE /tourismEventCategories/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var tourism_event_categories $tourismEventCategories */
        $tourismEventCategories = $this->tourismEventCategoriesRepository->find($id);

        if (empty($tourismEventCategories)) {
            return $this->sendError('Tourism Event Categories not found');
        }

        $tourismEventCategories->delete();

        return $this->sendResponse($id, 'Tourism Event Categories deleted successfully');
    }
}
