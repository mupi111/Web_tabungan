<?php

namespace App\Repositories;

use App\Models\Tabungan;
use App\Repositories\BaseRepository;

/**
 * Class TabunganRepository
 * @package App\Repositories
 * @version June 17, 2022, 6:50 am UTC
*/

class TabunganRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nasabah',
        'jenisTransaksi',
        'date',
        'time',
        'jumlah'
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
        return Tabungan::class;
    }
}
