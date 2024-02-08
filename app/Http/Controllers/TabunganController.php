<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTabunganRequest;
use App\Http\Requests\UpdateTabunganRequest;
use App\Repositories\TabunganRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TabunganController extends AppBaseController
{
    /** @var TabunganRepository $tabunganRepository*/
    private $tabunganRepository;

    public function __construct(TabunganRepository $tabunganRepo)
    {
        $this->tabunganRepository = $tabunganRepo;
    }

    /**
     * Display a listing of the Tabungan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tabungans = $this->tabunganRepository->all();

        return view('tabungans.index')
            ->with('tabungans', $tabungans);
    }

    /**
     * Show the form for creating a new Tabungan.
     *
     * @return Response
     */
    public function create()
    {   $nasabahs = \App\Models\Nasabah::all()->pluck('nama', 'nama');
        return view('tabungans.create',compact('nasabahs'));
    }

    /**
     * Store a newly created Tabungan in storage.
     *
     * @param CreateTabunganRequest $request
     *
     * @return Response
     */
    public function store(CreateTabunganRequest $request)
    {
        $input = $request->all();

        $tabungan = $this->tabunganRepository->create($input);

        Flash::success('Tabungan saved successfully.');

        return redirect(route('tabungans.index'));
    }

    /**
     * Display the specified Tabungan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tabungan = $this->tabunganRepository->find($id);

        if (empty($tabungan)) {
            Flash::error('Tabungan not found');

            return redirect(route('tabungans.index'));
        }

        return view('tabungans.show')->with('tabungan', $tabungan);
    }

    /**
     * Show the form for editing the specified Tabungan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tabungan = $this->tabunganRepository->find($id);

        if (empty($tabungan)) {
            Flash::error('Tabungan not found');

            return redirect(route('tabungans.index'));
        }
        $nasabahs= \App\Models\Nasabah::all()->pluck('nama', 'nama');
        return view('tabungans.edit', compact('nasabahs'))->with('tabungan', $tabungan);
    }

    /**
     * Update the specified Tabungan in storage.
     *
     * @param int $id
     * @param UpdateTabunganRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTabunganRequest $request)
    {
        $tabungan = $this->tabunganRepository->find($id);

        if (empty($tabungan)) {
            Flash::error('Tabungan not found');

            return redirect(route('tabungans.index'));
        }

        $tabungan = $this->tabunganRepository->update($request->all(), $id);

        Flash::success('Tabungan updated successfully.');

        return redirect(route('tabungans.index'));
    }

    /**
     * Remove the specified Tabungan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tabungan = $this->tabunganRepository->find($id);

        if (empty($tabungan)) {
            Flash::error('Tabungan not found');

            return redirect(route('tabungans.index'));
        }

        $this->tabunganRepository->delete($id);

        Flash::success('Tabungan deleted successfully.');

        return redirect(route('tabungans.index'));
    }
}
