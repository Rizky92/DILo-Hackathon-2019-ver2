<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createtourism_serv_prodsRequest;
use App\Http\Requests\Updatetourism_serv_prodsRequest;
use App\Repositories\tourism_serv_prodsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tourism_serv_prodsController extends AppBaseController
{
    /** @var  tourism_serv_prodsRepository */
    private $tourismServProdsRepository;

    public function __construct(tourism_serv_prodsRepository $tourismServProdsRepo)
    {
        $this->tourismServProdsRepository = $tourismServProdsRepo;
    }

    /**
     * Display a listing of the tourism_serv_prods.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tourismServProds = $this->tourismServProdsRepository->all();

        return view('tourism_serv_prods.index')
            ->with('tourismServProds', $tourismServProds);
    }

    /**
     * Show the form for creating a new tourism_serv_prods.
     *
     * @return Response
     */
    public function create()
    {
        return view('tourism_serv_prods.create');
    }

    /**
     * Store a newly created tourism_serv_prods in storage.
     *
     * @param Createtourism_serv_prodsRequest $request
     *
     * @return Response
     */
    public function store(Createtourism_serv_prodsRequest $request)
    {
        $input = $request->all();

        $tourismServProds = $this->tourismServProdsRepository->create($input);

        Flash::success('Tourism Serv Prods saved successfully.');

        return redirect(route('tourismServProds.index'));
    }

    /**
     * Display the specified tourism_serv_prods.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tourismServProds = $this->tourismServProdsRepository->find($id);

        if (empty($tourismServProds)) {
            Flash::error('Tourism Serv Prods not found');

            return redirect(route('tourismServProds.index'));
        }

        return view('tourism_serv_prods.show')->with('tourismServProds', $tourismServProds);
    }

    /**
     * Show the form for editing the specified tourism_serv_prods.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tourismServProds = $this->tourismServProdsRepository->find($id);

        if (empty($tourismServProds)) {
            Flash::error('Tourism Serv Prods not found');

            return redirect(route('tourismServProds.index'));
        }

        return view('tourism_serv_prods.edit')->with('tourismServProds', $tourismServProds);
    }

    /**
     * Update the specified tourism_serv_prods in storage.
     *
     * @param int $id
     * @param Updatetourism_serv_prodsRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetourism_serv_prodsRequest $request)
    {
        $tourismServProds = $this->tourismServProdsRepository->find($id);

        if (empty($tourismServProds)) {
            Flash::error('Tourism Serv Prods not found');

            return redirect(route('tourismServProds.index'));
        }

        $tourismServProds = $this->tourismServProdsRepository->update($request->all(), $id);

        Flash::success('Tourism Serv Prods updated successfully.');

        return redirect(route('tourismServProds.index'));
    }

    /**
     * Remove the specified tourism_serv_prods from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tourismServProds = $this->tourismServProdsRepository->find($id);

        if (empty($tourismServProds)) {
            Flash::error('Tourism Serv Prods not found');

            return redirect(route('tourismServProds.index'));
        }

        $this->tourismServProdsRepository->delete($id);

        Flash::success('Tourism Serv Prods deleted successfully.');

        return redirect(route('tourismServProds.index'));
    }
}
