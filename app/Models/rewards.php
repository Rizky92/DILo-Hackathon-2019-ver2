<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class rewards
 * @package App\Models
 * @version August 24, 2019, 4:15 pm UTC
 *
 * @property string title
 * @property string description
 * @property string reward_token
 */
class rewards extends Model
{
    use SoftDeletes;

    public $table = 'rewards';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'description',
        'reward_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'reward_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'description' => 'token string,100 text',
        'reward_token' => 'required'
    ];

    
}
