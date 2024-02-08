<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTabunganAPIRequest;
use App\Http\Requests\API\UpdateTabunganAPIRequest;
use App\Models\Tabungan;
use App\Repositories\TabunganRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TabunganController
 * @package App\Http\Controllers\API
 */

class TabunganAPIController extends AppBaseController
{
    /** @var  TabunganRepository */
    private $tabunganRepository;

    public function __construct(TabunganRepository $tabunganRepo)
    {
        $this->tabunganRepository = $tabunganRepo;
    }

    /**
     * Display a listing of the Tabungan.
     * GET|HEAD /tabungans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tabungans = $this->tabunganRepository->all(
            $request->except(['skip']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tabungans->toArray(), 'Tabungans retrieved successfully');
    }

    /**
     * Store a newly created Tabungan in storage.
     * POST /tabungans
     *
     * @param CreateTabunganAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTabunganAPIRequest $request)
    {
        $input = $request->all($this->tabunganRepository->getFieldsSearchable());

        $tabungan = $this->tabunganRepository->create($input);

        return $this->sendResponse($tabungan->toArray(), 'Tabungan saved successfully');
    }

    /**
     * Display the specified Tabungan.
     * GET|HEAD /tabungans/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Tabungan $tabungan */
        $tabungan = $this->tabunganRepository->find($id);

        if (empty($tabungan)) {
            return $this->sendError('Tabungan not found');
        }

        return $this->sendResponse($tabungan->toArray(), 'Tabungan retrieved successfully');
    }

    /**
     * Update the specified Tabungan in storage.
     * PUT/PATCH /tabungans/{id}
     *
     * @param int $id
     * @param UpdateTabunganAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTabunganAPIRequest $request)
    {
        $input = $request->all($this->tabunganRepository->getFieldsSearchable());

        /** @var Tabungan $tabungan */
        $tabungan = $this->tabunganRepository->find($id);

        if (empty($tabungan)) {
            return $this->sendError('Tabungan not found');
        }

        $tabungan = $this->tabunganRepository->update($input, $id);

        return $this->sendResponse($tabungan->toArray(), 'Tabungan updated successfully');
    }

    /**
     * Remove the specified Tabungan from storage.
     * DELETE /tabungans/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Tabungan $tabungan */
        $tabungan = $this->tabunganRepository->find($id);

        if (empty($tabungan)) {
            return $this->sendError('Tabungan not found');
        }

        $tabungan->delete();

        return $this->sendSuccess('Tabungan deleted successfully');
    }
}
