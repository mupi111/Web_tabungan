<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Nasabah
 * @package App\Models
 * @version June 17, 2022, 6:42 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $tabungans
 * @property string $nama
 * @property string $alamat
 * @property string $nomorhp
 * @property string $imgnasabah
 * @property integer $saldo
 */
class Nasabah extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'nasabahs';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama',
        'alamat',
        'nomorhp',
        'imgnasabah',
        'saldo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'alamat' => 'string',
        'nomorhp' => 'string',
        'imgnasabah' => 'string',
        'saldo' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'alamat' => 'required',
        'nomorhp' => 'required',
        'imgnasabah' => 'required',
        'saldo' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tabungans()
    {
        return $this->hasMany(\App\Models\Tabungan::class, 'nasabah');
    }
}
