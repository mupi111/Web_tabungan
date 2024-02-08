<?php

namespace App\Repositories;

use App\Models\Nasabah;
use App\Repositories\BaseRepository;

/**
 * Class NasabahRepository
 * @package App\Repositories
 * @version June 17, 2022, 6:42 am UTC
*/

class NasabahRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'alamat',
        'nomorhp',
        'imgnasabah',
        'saldo'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Nasabah::class;
    }
}
