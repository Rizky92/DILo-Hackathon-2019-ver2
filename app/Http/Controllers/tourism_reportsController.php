<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createtourism_reportsRequest;
use App\Http\Requests\Updatetourism_reportsRequest;
use App\Repositories\tourism_reportsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tourism_reportsController extends AppBaseController
{
    /** @var  tourism_reportsRepository */
    private $tourismReportsRepository;

    public function __construct(tourism_reportsRepository $tourismReportsRepo)
    {
        $this->tourismReportsRepository = $tourismReportsRepo;
    }

    /**
     * Display a listing of the tourism_reports.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tourismReports = $this->tourismReportsRepository->all();

        return view('tourism_reports.index')
            ->with('tourismReports', $tourismReports);
    }

    /**
     * Show the form for creating a new tourism_reports.
     *
     * @return Response
     */
    public function create()
    {
        return view('tourism_reports.create');
    }

    /**
     * Store a newly created tourism_reports in storage.
     *
     * @param Createtourism_reportsRequest $request
     *
     * @return Response
     */
    public function store(Createtourism_reportsRequest $request)
    {
        $input = $request->all();

        $tourismReports = $this->tourismReportsRepository->create($input);

        Flash::success('Tourism Reports saved successfully.');

        return redirect(route('tourismReports.index'));
    }

    /**
     * Display the specified tourism_reports.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tourismReports = $this->tourismReportsRepository->find($id);

        if (empty($tourismReports)) {
            Flash::error('Tourism Reports not found');

            return redirect(route('tourismReports.index'));
        }

        return view('tourism_reports.show')->with('tourismReports', $tourismReports);
    }

    /**
     * Show the form for editing the specified tourism_reports.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tourismReports = $this->tourismReportsRepository->find($id);

        if (empty($tourismReports)) {
            Flash::error('Tourism Reports not found');

            return redirect(route('tourismReports.index'));
        }

        return view('tourism_reports.edit')->with('tourismReports', $tourismReports);
    }

    /**
     * Update the specified tourism_reports in storage.
     *
     * @param int $id
     * @param Updatetourism_reportsRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetourism_reportsRequest $request)
    {
        $tourismReports = $this->tourismReportsRepository->find($id);

        if (empty($tourismReports)) {
            Flash::error('Tourism Reports not found');

            return redirect(route('tourismReports.index'));
        }

        $tourismReports = $this->tourismReportsRepository->update($request->all(), $id);

        Flash::success('Tourism Reports updated successfully.');

        return redirect(route('tourismReports.index'));
    }

    /**
     * Remove the specified tourism_reports from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tourismReports = $this->tourismReportsRepository->find($id);

        if (empty($tourismReports)) {
            Flash::error('Tourism Reports not found');

            return redirect(route('tourismReports.index'));
        }

        $this->tourismReportsRepository->delete($id);

        Flash::success('Tourism Reports deleted successfully.');

        return redirect(route('tourismReports.index'));
    }
}
