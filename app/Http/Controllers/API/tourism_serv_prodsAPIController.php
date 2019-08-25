<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createtourism_serv_prodsAPIRequest;
use App\Http\Requests\API\Updatetourism_serv_prodsAPIRequest;
use App\Models\tourism_serv_prods;
use App\Repositories\tourism_serv_prodsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class tourism_serv_prodsController
 * @package App\Http\Controllers\API
 */

class tourism_serv_prodsAPIController extends AppBaseController
{
    /** @var  tourism_serv_prodsRepository */
    private $tourismServProdsRepository;

    public function __construct(tourism_serv_prodsRepository $tourismServProdsRepo)
    {
        $this->tourismServProdsRepository = $tourismServProdsRepo;
    }

    /**
     * Display a listing of the tourism_serv_prods.
     * GET|HEAD /tourismServProds
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tourismServProds = $this->tourismServProdsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tourismServProds->toArray(), 'Tourism Serv Prods retrieved successfully');
    }

    /**
     * Store a newly created tourism_serv_prods in storage.
     * POST /tourismServProds
     *
     * @param Createtourism_serv_prodsAPIRequest $request
     *
     * @return Response
     */
    public function store(Createtourism_serv_prodsAPIRequest $request)
    {
        $input = $request->all();

        $tourismServProds = $this->tourismServProdsRepository->create($input);

        return $this->sendResponse($tourismServProds->toArray(), 'Tourism Serv Prods saved successfully');
    }

    /**
     * Display the specified tourism_serv_prods.
     * GET|HEAD /tourismServProds/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var tourism_serv_prods $tourismServProds */
        $tourismServProds = $this->tourismServProdsRepository->find($id);

        if (empty($tourismServProds)) {
            return $this->sendError('Tourism Serv Prods not found');
        }

        return $this->sendResponse($tourismServProds->toArray(), 'Tourism Serv Prods retrieved successfully');
    }

    /**
     * Update the specified tourism_serv_prods in storage.
     * PUT/PATCH /tourismServProds/{id}
     *
     * @param int $id
     * @param Updatetourism_serv_prodsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetourism_serv_prodsAPIRequest $request)
    {
        $input = $request->all();

        /** @var tourism_serv_prods $tourismServProds */
        $tourismServProds = $this->tourismServProdsRepository->find($id);

        if (empty($tourismServProds)) {
            return $this->sendError('Tourism Serv Prods not found');
        }

        $tourismServProds = $this->tourismServProdsRepository->update($input, $id);

        return $this->sendResponse($tourismServProds->toArray(), 'tourism_serv_prods updated successfully');
    }

    /**
     * Remove the specified tourism_serv_prods from storage.
     * DELETE /tourismServProds/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var tourism_serv_prods $tourismServProds */
        $tourismServProds = $this->tourismServProdsRepository->find($id);

        if (empty($tourismServProds)) {
            return $this->sendError('Tourism Serv Prods not found');
        }

        $tourismServProds->delete();

        return $this->sendResponse($id, 'Tourism Serv Prods deleted successfully');
    }
}
