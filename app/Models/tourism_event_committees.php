<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class tourism_event_committees
 * @package App\Models
 * @version August 24, 2019, 2:21 pm UTC
 *
 * @property integer tourism_event_id
 * @property string name
 * @property string role
 * @property string tel
 * @property string email
 */
class tourism_event_committees extends Model
{
    use SoftDeletes;

    public $table = 'tourism_event_committees';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'tourism_event_id',
        'name',
        'role',
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
        'tourism_event_id' => 'integer',
        'name' => 'string',
        'role' => 'string',
        'tel' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tourism_event_id' => 'required',
        'name' => 'required',
        'role' => 'required',
        'tel' => 'required',
        'email' => 'required'
    ];

    
}
