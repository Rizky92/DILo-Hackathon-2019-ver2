<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class tourism_destinations
 * @package App\Models
 * @version August 24, 2019, 1:03 pm UTC
 *
 * @property string name
 * @property string description
 * @property string owner
 * @property integer tourism_dest_cat_id
 * @property string address
 * @property string coords
 * @property string email
 * @property string tel
 */
class tourism_destinations extends Model
{
    use SoftDeletes;

    public $table = 'tourism_destinations';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'description',
        'owner',
        'tourism_dest_cat_id',
        'address',
        'coords',
        'email',
        'tel'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'owner' => 'string',
        'tourism_dest_cat_id' => 'integer',
        'address' => 'string',
        'coords' => 'string',
        'email' => 'string',
        'tel' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'description' => 'required',
        'owner' => 'required',
        'tourism_dest_cat_id' => 'required',
        'address' => 'required',
        'email' => 'required',
        'tel' => 'required'
    ];

    
}
