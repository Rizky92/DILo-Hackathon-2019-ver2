<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class client_reviews
 * @package App\Models
 * @version August 24, 2019, 3:38 pm UTC
 *
 * @property integer client_user_id
 * @property string date
 * @property integer tourism_dest_id
 * @property integer satisfactory_level
 * @property string comment
 */
class client_reviews extends Model
{
    use SoftDeletes;

    public $table = 'client_reviews';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'client_user_id',
        'date',
        'tourism_dest_id',
        'satisfactory_level',
        'comment'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'client_user_id' => 'integer',
        'date' => 'date',
        'tourism_dest_id' => 'integer',
        'satisfactory_level' => 'integer',
        'comment' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'client_user_id' => 'required',
        'date' => 'required',
        'tourism_dest_id' => 'required',
        'satisfactory_level' => 'required'
    ];

    
}
