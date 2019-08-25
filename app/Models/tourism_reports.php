<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class tourism_reports
 * @package App\Models
 * @version August 24, 2019, 1:11 pm UTC
 *
 * @property integer tourism_dest_id
 * @property integer target
 * @property integer num_of_res
 * @property integer num_of_visits
 * @property integer income
 * @property integer costs
 * @property integer profit
 */
class tourism_reports extends Model
{
    use SoftDeletes;

    public $table = 'tourism_reports';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'tourism_dest_id',
        'target',
        'num_of_res',
        'num_of_visits',
        'income',
        'costs',
        'profit'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tourism_dest_id' => 'integer',
        'target' => 'integer',
        'num_of_res' => 'integer',
        'num_of_visits' => 'integer',
        'income' => 'integer',
        'costs' => 'integer',
        'profit' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tourism_dest_id' => 'required',
        'target' => 'required',
        'num_of_res' => 'required',
        'num_of_visits' => 'required',
        'income' => 'required',
        'costs' => 'required',
        'profit' => 'required'
    ];

    
}
