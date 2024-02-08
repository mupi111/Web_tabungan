<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateNasabahAPIRequest;
use App\Http\Requests\API\UpdateNasabahAPIRequest;
use App\Models\Nasabah;
use App\Repositories\NasabahRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Storage;
use Response;

/**
 * Class NasabahController
 * @package App\Http\Controllers\API
 */

class NasabahAPIController extends AppBaseController
{
    /** @var  NasabahRepository */
    private $nasabahRepository;

    public function __construct(NasabahRepository $nasabahRepo)
    {
        $this->nasabahRepository = $nasabahRepo;
    }

    /**
     * Display a listing of the Nasabah.
     * GET|HEAD /nasabahs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $nasabahs = $this->nasabahRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );


        return $this->sendResponse($nasabahs->toArray(), 'Nasabahs retrieved successfully');
    }

    /**
     * Store a newly created Nasabah in storage.
     * POST /nasabahs
     *
     * @param CreateNasabahAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateNasabahAPIRequest $request)
    {
        $image = $request->file;  // your base64 encoded
        // $image = str_replace('data:image/png;base64,', '', $image);
        // $image = str_replace(' ', '+', $image);

        Storage::disk('public')->put($request->imgnasabah, base64_decode($image));
        // file_put_contents($request->imgnasabah, base64_decode($image));
        $input = $request->all($this->nasabahRepository->getFieldsSearchable());
        $nasabah = $this->nasabahRepository->create($input);

        return $this->sendResponse($nasabah->toArray(), 'Nasabah saved successfully');
    }

    /**
     * Display the specified Nasabah.
     * GET|HEAD /nasabahs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Nasabah $nasabah */
        $nasabah = $this->nasabahRepository->find($id);

        if (empty($nasabah)) {
            return $this->sendError('Nasabah not found');
        }

        return $this->sendResponse($nasabah->toArray(), 'Nasabah retrieved successfully');
    }

    /**
     * Update the specified Nasabah in storage.
     * PUT/PATCH /nasabahs/{id}
     *
     * @param int $id
     * @param UpdateNasabahAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNasabahAPIRequest $request)
    {
        $input = $request->all();

        /** @var Nasabah $nasabah */
        $nasabah = $this->nasabahRepository->find($id);

        if (empty($nasabah)) {
            return $this->sendError('Nasabah not found');
        }
        $image = $request->file;
        if ($image != "") {
            $image = $request->file;
            Storage::disk('public')->put($request->imgnasabah, base64_decode($image));
            $input = $request->all($this->nasabahRepository->getFieldsSearchable());
        } else {
            $input = $request->except(['imgnasabah', 'file']);
        }

        $nasabah = $this->nasabahRepository->update($input, $id);

        return $this->sendResponse($nasabah->toArray(), 'Nasabah updated successfully');
    }

    /**
     * Remove the specified Nasabah from storage.
     * DELETE /nasabahs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Nasabah $nasabah */
        $nasabah = $this->nasabahRepository->find($id);

        if (empty($nasabah)) {
            return $this->sendError('Nasabah not found');
        }

        $nasabah->delete();

        return $this->sendSuccess('Nasabah deleted successfully');
    }
}
