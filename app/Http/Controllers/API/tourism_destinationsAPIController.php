<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createtourism_destinationsAPIRequest;
use App\Http\Requests\API\Updatetourism_destinationsAPIRequest;
use App\Models\tourism_destinations;
use App\Repositories\tourism_destinationsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class tourism_destinationsController
 * @package App\Http\Controllers\API
 */

class tourism_destinationsAPIController extends AppBaseController
{
    /** @var  tourism_destinationsRepository */
    private $tourismDestinationsRepository;

    public function __construct(tourism_destinationsRepository $tourismDestinationsRepo)
    {
        $this->tourismDestinationsRepository = $tourismDestinationsRepo;
    }

    /**
     * Display a listing of the tourism_destinations.
     * GET|HEAD /tourismDestinations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tourismDestinations = $this->tourismDestinationsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tourismDestinations->toArray(), 'Tourism Destinations retrieved successfully');
    }

    /**
     * Store a newly created tourism_destinations in storage.
     * POST /tourismDestinations
     *
     * @param Createtourism_destinationsAPIRequest $request
     *
     * @return Response
     */
    public function store(Createtourism_destinationsAPIRequest $request)
    {
        $input = $request->all();

        $tourismDestinations = $this->tourismDestinationsRepository->create($input);

        return $this->sendResponse($tourismDestinations->toArray(), 'Tourism Destinations saved successfully');
    }

    /**
     * Display the specified tourism_destinations.
     * GET|HEAD /tourismDestinations/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var tourism_destinations $tourismDestinations */
        $tourismDestinations = $this->tourismDestinationsRepository->find($id);

        if (empty($tourismDestinations)) {
            return $this->sendError('Tourism Destinations not found');
        }

        return $this->sendResponse($tourismDestinations->toArray(), 'Tourism Destinations retrieved successfully');
    }

    /**
     * Update the specified tourism_destinations in storage.
     * PUT/PATCH /tourismDestinations/{id}
     *
     * @param int $id
     * @param Updatetourism_destinationsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetourism_destinationsAPIRequest $request)
    {
        $input = $request->all();

        /** @var tourism_destinations $tourismDestinations */
        $tourismDestinations = $this->tourismDestinationsRepository->find($id);

        if (empty($tourismDestinations)) {
            return $this->sendError('Tourism Destinations not found');
        }

        $tourismDestinations = $this->tourismDestinationsRepository->update($input, $id);

        return $this->sendResponse($tourismDestinations->toArray(), 'tourism_destinations updated successfully');
    }

    /**
     * Remove the specified tourism_destinations from storage.
     * DELETE /tourismDestinations/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var tourism_destinations $tourismDestinations */
        $tourismDestinations = $this->tourismDestinationsRepository->find($id);

        if (empty($tourismDestinations)) {
            return $this->sendError('Tourism Destinations not found');
        }

        $tourismDestinations->delete();

        return $this->sendResponse($id, 'Tourism Destinations deleted successfully');
    }
}
