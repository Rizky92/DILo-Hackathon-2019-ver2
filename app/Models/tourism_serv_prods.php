<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class tourism_serv_prods
 * @package App\Models
 * @version August 24, 2019, 2:34 pm UTC
 *
 * @property integer tourism_dest_id
 * @property integer tourism_serv_prod_cat_id
 * @property string name
 * @property integer price
 * @property boolean is_available
 * @property string tel
 * @property string email
 */
class tourism_serv_prods extends Model
{
    use SoftDeletes;

    public $table = 'tourism_serv_prods';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'tourism_dest_id',
        'tourism_serv_prod_cat_id',
        'name',
        'price',
        'is_available',
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
        'tourism_dest_id' => 'integer',
        'tourism_serv_prod_cat_id' => 'integer',
        'name' => 'string',
        'price' => 'integer',
        'is_available' => 'boolean',
        'tel' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tourism_dest_id' => 'required',
        'tourism_serv_prod_cat_id' => 'required',
        'name' => 'required',
        'price' => 'required',
        'is_available' => 'required',
        'tel' => 'required',
        'email' => 'required'
    ];

    
}
