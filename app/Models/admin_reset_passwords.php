<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class admin_reset_passwords
 * @package App\Models
 * @version August 24, 2019, 12:52 pm UTC
 *
 * @property string email
 * @property string reset_token
 */
class admin_reset_passwords extends Model
{
    use SoftDeletes;

    public $table = 'admin_reset_passwords';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'email',
        'reset_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'email' => 'string',
        'reset_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'email' => 'required',
        'reset_token' => 'required'
    ];

    
}
