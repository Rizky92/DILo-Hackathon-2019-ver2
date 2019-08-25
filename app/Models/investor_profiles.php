<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class investor_profiles
 * @package App\Models
 * @version August 24, 2019, 4:23 pm UTC
 *
 * @property string name
 * @property string description
 * @property string address
 * @property string coords
 * @property string ceo_name
 * @property string email
 * @property string tel
 */
class investor_profiles extends Model
{
    use SoftDeletes;

    public $table = 'investor_profiles';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'description',
        'address',
        'coords',
        'ceo_name',
        'email',
        'tel'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'address' => 'string',
        'coords' => 'string',
        'ceo_name' => 'string',
        'email' => 'string',
        'tel' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'description' => 'required',
        'address' => 'required',
        'ceo_name' => 'required',
        'email' => 'required',
        'tel' => 'required'
    ];

    
}
