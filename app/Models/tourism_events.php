<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class tourism_events
 * @package App\Models
 * @version August 24, 2019, 2:16 pm UTC
 *
 * @property string name
 * @property string description
 * @property integer tourism_event_cat_id
 * @property string event_holder_name
 * @property string event_holder_tel
 * @property string event_holder_email
 * @property string date_start
 * @property string date_end
 * @property integer quota
 * @property integer tourism_dest_id
 */
class tourism_events extends Model
{
    use SoftDeletes;

    public $table = 'tourism_events';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'description',
        'tourism_event_cat_id',
        'event_holder_name',
        'event_holder_tel',
        'event_holder_email',
        'date_start',
        'date_end',
        'quota',
        'tourism_dest_id'
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
        'tourism_event_cat_id' => 'integer',
        'event_holder_name' => 'string',
        'event_holder_tel' => 'string',
        'event_holder_email' => 'string',
        'date_start' => 'date',
        'date_end' => 'date',
        'quota' => 'integer',
        'tourism_dest_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'description' => 'required',
        'tourism_event_cat_id' => 'required',
        'event_holder_name' => 'required',
        'event_holder_tel' => 'required',
        'event_holder_email' => 'required',
        'date_start' => 'required',
        'date_end' => 'required',
        'tourism_dest_id' => 'required'
    ];

    
}
