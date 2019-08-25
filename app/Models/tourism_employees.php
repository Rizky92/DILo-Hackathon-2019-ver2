<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class tourism_employees
 * @package App\Models
 * @version August 24, 2019, 1:09 pm UTC
 *
 * @property integer tourism_dest_id
 * @property strng nama
 * @property string tgl_lahir
 * @property string jk
 * @property string alamat
 * @property string tel
 * @property string email
 * @property string jabatan
 */
class tourism_employees extends Model
{
    use SoftDeletes;

    public $table = 'tourism_employees';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'tourism_dest_id',
        'nama',
        'tgl_lahir',
        'jk',
        'alamat',
        'tel',
        'email',
        'jabatan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tourism_dest_id' => 'integer',
        'tgl_lahir' => 'date',
        'jk' => 'string',
        'alamat' => 'string',
        'tel' => 'string',
        'email' => 'string',
        'jabatan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tourism_dest_id' => 'required',
        'nama' => 'required',
        'tgl_lahir' => 'required',
        'jk' => 'required',
        'alamat' => 'required',
        'tel' => 'required',
        'email' => 'required',
        'jabatan' => 'required'
    ];

    
}
