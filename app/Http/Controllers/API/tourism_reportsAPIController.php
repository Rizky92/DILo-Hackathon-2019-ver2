<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createtourism_reportsAPIRequest;
use App\Http\Requests\API\Updatetourism_reportsAPIRequest;
use App\Models\tourism_reports;
use App\Repositories\tourism_reportsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class tourism_reportsController
 * @package App\Http\Controllers\API
 */

class tourism_reportsAPIController extends AppBaseController
{
    /** @var  tourism_reportsRepository */
    private $tourismReportsRepository;

    public function __construct(tourism_reportsRepository $tourismReportsRepo)
    {
        $this->tourismReportsRepository = $tourismReportsRepo;
    }

    /**
     * Display a listing of the tourism_reports.
     * GET|HEAD /tourismReports
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tourismReports = $this->tourismReportsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tourismReports->toArray(), 'Tourism Reports retrieved successfully');
    }

    /**
     * Store a newly created tourism_reports in storage.
     * POST /tourismReports
     *
     * @param Createtourism_reportsAPIRequest $request
     *
     * @return Response
     */
    public function store(Createtourism_reportsAPIRequest $request)
    {
        $input = $request->all();

        $tourismReports = $this->tourismReportsRepository->create($input);

        return $this->sendResponse($tourismReports->toArray(), 'Tourism Reports saved successfully');
    }

    /**
     * Display the specified tourism_reports.
     * GET|HEAD /tourismReports/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var tourism_reports $tourismReports */
        $tourismReports = $this->tourismReportsRepository->find($id);

        if (empty($tourismReports)) {
            return $this->sendError('Tourism Reports not found');
        }

        return $this->sendResponse($tourismReports->toArray(), 'Tourism Reports retrieved successfully');
    }

    /**
     * Update the specified tourism_reports in storage.
     * PUT/PATCH /tourismReports/{id}
     *
     * @param int $id
     * @param Updatetourism_reportsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetourism_reportsAPIRequest $request)
    {
        $input = $request->all();

        /** @var tourism_reports $tourismReports */
        $tourismReports = $this->tourismReportsRepository->find($id);

        if (empty($tourismReports)) {
            return $this->sendError('Tourism Reports not found');
        }

        $tourismReports = $this->tourismReportsRepository->update($input, $id);

        return $this->sendResponse($tourismReports->toArray(), 'tourism_reports updated successfully');
    }

    /**
     * Remove the specified tourism_reports from storage.
     * DELETE /tourismReports/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var tourism_reports $tourismReports */
        $tourismReports = $this->tourismReportsRepository->find($id);

        if (empty($tourismReports)) {
            return $this->sendError('Tourism Reports not found');
        }

        $tourismReports->delete();

        return $this->sendResponse($id, 'Tourism Reports deleted successfully');
    }
}
