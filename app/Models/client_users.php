<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class client_users
 * @package App\Models
 * @version August 24, 2019, 3:12 pm UTC
 *
 * @property string username
 * @property string password
 * @property string email
 * @property string remember_token
 */
class client_users extends Model
{
    use SoftDeletes;

    public $table = 'client_users';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'username',
        'password',
        'email',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'username' => 'string',
        'password' => 'string',
        'email' => 'string',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'username' => 'required',
        'password' => 'required',
        'email' => 'required'
    ];

    
}
