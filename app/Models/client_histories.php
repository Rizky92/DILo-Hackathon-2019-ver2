<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class client_histories
 * @package App\Models
 * @version August 24, 2019, 4:48 pm UTC
 *
 * @property integer client_user_id
 * @property integer tourism_dest_id
 * @property time time
 */
class client_histories extends Model
{
    use SoftDeletes;

    public $table = 'client_histories';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'client_user_id',
        'tourism_dest_id',
        'time'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'client_user_id' => 'integer',
        'tourism_dest_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'client_user_id' => 'required',
        'tourism_dest_id' => 'required',
        'time' => 'required'
    ];

    
}
