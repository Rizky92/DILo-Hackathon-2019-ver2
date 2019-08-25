<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class achievements
 * @package App\Models
 * @version August 24, 2019, 4:19 pm UTC
 *
 * @property string name
 * @property integer points
 * @property string achievement_key
 */
class achievements extends Model
{
    use SoftDeletes;

    public $table = 'achievements';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'points',
        'achievement_key'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'points' => 'integer',
        'achievement_key' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'points' => 'required',
        'achievement_key' => 'required'
    ];

    
}
