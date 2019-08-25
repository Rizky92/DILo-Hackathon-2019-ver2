<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class client_profiles
 * @package App\Models
 * @version August 24, 2019, 3:17 pm UTC
 *
 * @property string nama
 * @property string tgl_lahir
 * @property string jk
 * @property string alamat
 * @property string tel
 * @property string email
 */
class client_profiles extends Model
{
    use SoftDeletes;

    public $table = 'client_profiles';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'tgl_lahir',
        'jk',
        'alamat',
        'tel',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'tgl_lahir' => 'date',
        'jk' => 'string',
        'alamat' => 'string',
        'tel' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'tgl_lahir' => 'required',
        'jk' => 'required',
        'alamat' => 'required',
        'tel' => 'required',
        'email' => 'required'
    ];

    
}
