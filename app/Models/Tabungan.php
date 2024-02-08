<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Tabungan
 * @package App\Models
 * @version June 17, 2022, 6:50 am UTC
 *
 * @property \App\Models\Nasabah $nasabah
 * @property integer $nasabah
 * @property string $jenisTransaksi
 * @property string $date
 * @property string $time
 * @property integer $jumlah
 */
class Tabungan extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'tabungans';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nasabah',
        'jenisTransaksi',
        'date',
        'time',
        'jumlah'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nasabah' => 'string',
        'jenisTransaksi' => 'string',
        'date' => 'string',
        'time' => 'string',
        'jumlah' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nasabah' => 'required',
        'jenisTransaksi' => 'required',
        'date' => 'required',
        'time' => 'required',
        'jumlah' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function nasabah()
    {
        return $this->belongsTo(\App\Models\Nasabah::class, 'nasabah');
    }
}
