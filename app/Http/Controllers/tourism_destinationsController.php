<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createtourism_destinationsRequest;
use App\Http\Requests\Updatetourism_destinationsRequest;
use App\Repositories\tourism_destinationsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tourism_destinationsController extends AppBaseController
{
    /** @var  tourism_destinationsRepository */
    private $tourismDestinationsRepository;

    public function __construct(tourism_destinationsRepository $tourismDestinationsRepo)
    {
        $this->tourismDestinationsRepository = $tourismDestinationsRepo;
    }

    /**
     * Display a listing of the tourism_destinations.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tourismDestinations = $this->tourismDestinationsRepository->all();

        return view('tourism_destinations.index')
            ->with('tourismDestinations', $tourismDestinations);
    }

    /**
     * Show the form for creating a new tourism_destinations.
     *
     * @return Response
     */
    public function create()
    {
        return view('tourism_destinations.create');
    }

    /**
     * Store a newly created tourism_destinations in storage.
     *
     * @param Createtourism_destinationsRequest $request
     *
     * @return Response
     */
    public function store(Createtourism_destinationsRequest $request)
    {
        $input = $request->all();

        $tourismDestinations = $this->tourismDestinationsRepository->create($input);

        Flash::success('Tourism Destinations saved successfully.');

        return redirect(route('tourismDestinations.index'));
    }

    /**
     * Display the specified tourism_destinations.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tourismDestinations = $this->tourismDestinationsRepository->find($id);

        if (empty($tourismDestinations)) {
            Flash::error('Tourism Destinations not found');

            return redirect(route('tourismDestinations.index'));
        }

        return view('tourism_destinations.show')->with('tourismDestinations', $tourismDestinations);
    }

    /**
     * Show the form for editing the specified tourism_destinations.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tourismDestinations = $this->tourismDestinationsRepository->find($id);

        if (empty($tourismDestinations)) {
            Flash::error('Tourism Destinations not found');

            return redirect(route('tourismDestinations.index'));
        }

        return view('tourism_destinations.edit')->with('tourismDestinations', $tourismDestinations);
    }

    /**
     * Update the specified tourism_destinations in storage.
     *
     * @param int $id
     * @param Updatetourism_destinationsRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetourism_destinationsRequest $request)
    {
        $tourismDestinations = $this->tourismDestinationsRepository->find($id);

        if (empty($tourismDestinations)) {
            Flash::error('Tourism Destinations not found');

            return redirect(route('tourismDestinations.index'));
        }

        $tourismDestinations = $this->tourismDestinationsRepository->update($request->all(), $id);

        Flash::success('Tourism Destinations updated successfully.');

        return redirect(route('tourismDestinations.index'));
    }

    /**
     * Remove the specified tourism_destinations from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tourismDestinations = $this->tourismDestinationsRepository->find($id);

        if (empty($tourismDestinations)) {
            Flash::error('Tourism Destinations not found');

            return redirect(route('tourismDestinations.index'));
        }

        $this->tourismDestinationsRepository->delete($id);

        Flash::success('Tourism Destinations deleted successfully.');

        return redirect(route('tourismDestinations.index'));
    }
}
