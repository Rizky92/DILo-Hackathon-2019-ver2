<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class missions
 * @package App\Models
 * @version August 24, 2019, 4:17 pm UTC
 *
 * @property string name
 * @property integer length
 * @property integer points
 * @property string mission_key
 */
class missions extends Model
{
    use SoftDeletes;

    public $table = 'missions';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'length',
        'points',
        'mission_key'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'length' => 'integer',
        'points' => 'integer',
        'mission_key' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'length' => 'required',
        'points' => 'required',
        'mission_key' => 'required'
    ];

    
}
