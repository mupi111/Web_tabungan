<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNasabahRequest;
use App\Http\Requests\UpdateNasabahRequest;
use App\Repositories\NasabahRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class NasabahController extends AppBaseController
{
    /** @var NasabahRepository $nasabahRepository*/
    private $nasabahRepository;

    public function __construct(NasabahRepository $nasabahRepo)
    {
        $this->nasabahRepository = $nasabahRepo;
    }

    /**
     * Display a listing of the Nasabah.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $nasabahs = $this->nasabahRepository->all();

        return view('nasabahs.index')
            ->with('nasabahs', $nasabahs);
    }

    /**
     * Show the form for creating a new Nasabah.
     *
     * @return Response
     */
    public function create()
    {
        return view('nasabahs.create');
    }

    /**
     * Store a newly created Nasabah in storage.
     *
     * @param CreateNasabahRequest $request
     *
     * @return Response
     */
    public function store(CreateNasabahRequest $request)
    {
        $input = $request->all();

        $nasabah = $this->nasabahRepository->create($input);

        Flash::success('Nasabah saved successfully.');

        return redirect(route('nasabahs.index'));
    }

    /**
     * Display the specified Nasabah.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nasabah = $this->nasabahRepository->find($id);

        if (empty($nasabah)) {
            Flash::error('Nasabah not found');

            return redirect(route('nasabahs.index'));
        }

        return view('nasabahs.show')->with('nasabah', $nasabah);
    }

    /**
     * Show the form for editing the specified Nasabah.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nasabah = $this->nasabahRepository->find($id);

        if (empty($nasabah)) {
            Flash::error('Nasabah not found');

            return redirect(route('nasabahs.index'));
        }

        return view('nasabahs.edit')->with('nasabah', $nasabah);
    }

    /**
     * Update the specified Nasabah in storage.
     *
     * @param int $id
     * @param UpdateNasabahRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNasabahRequest $request)
    {
        $nasabah = $this->nasabahRepository->find($id);

        if (empty($nasabah)) {
            Flash::error('Nasabah not found');

            return redirect(route('nasabahs.index'));
        }

        $nasabah = $this->nasabahRepository->update($request->all(), $id);

        Flash::success('Nasabah updated successfully.');

        return redirect(route('nasabahs.index'));
    }

    /**
     * Remove the specified Nasabah from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nasabah = $this->nasabahRepository->find($id);

        if (empty($nasabah)) {
            Flash::error('Nasabah not found');

            return redirect(route('nasabahs.index'));
        }

        $this->nasabahRepository->delete($id);

        Flash::success('Nasabah deleted successfully.');

        return redirect(route('nasabahs.index'));
    }
}
