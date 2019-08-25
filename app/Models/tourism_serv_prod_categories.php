<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class tourism_serv_prod_categories
 * @package App\Models
 * @version August 24, 2019, 12:58 pm UTC
 *
 * @property string name
 */
class tourism_serv_prod_categories extends Model
{
    use SoftDeletes;

    public $table = 'tourism_serv_prod_categories';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    
}
