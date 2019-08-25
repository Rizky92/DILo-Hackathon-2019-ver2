<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class client_scores
 * @package App\Models
 * @version August 24, 2019, 4:26 pm UTC
 *
 * @property integer client_user_id
 * @property integer total
 */
class client_scores extends Model
{
    use SoftDeletes;

    public $table = 'client_scores';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'client_user_id',
        'total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'client_user_id' => 'integer',
        'total' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'client_user_id' => 'required',
        'total' => 'required'
    ];

    
}
