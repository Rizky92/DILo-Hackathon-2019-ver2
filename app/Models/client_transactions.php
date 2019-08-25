<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class client_transactions
 * @package App\Models
 * @version August 24, 2019, 4:31 pm UTC
 *
 * @property integer client_user_id
 * @property integer tourism_serv_prod_id
 * @property time time
 * @property integer quantity
 */
class client_transactions extends Model
{
    use SoftDeletes;

    public $table = 'client_transactions';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'client_user_id',
        'tourism_serv_prod_id',
        'time',
        'quantity'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'client_user_id' => 'integer',
        'tourism_serv_prod_id' => 'integer',
        'quantity' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'client_user_id' => 'required',
        'tourism_serv_prod_id' => 'required',
        'time' => 'required',
        'quantity' => 'required'
    ];

    
}
