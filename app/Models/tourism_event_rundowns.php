<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class tourism_event_rundowns
 * @package App\Models
 * @version August 24, 2019, 2:47 pm UTC
 *
 * @property integer tourism_event_id
 * @property string name
 * @property time time
 * @property string presenter
 * @property string misc
 */
class tourism_event_rundowns extends Model
{
    use SoftDeletes;

    public $table = 'tourism_event_rundowns';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'tourism_event_id',
        'name',
        'time',
        'presenter',
        'misc'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tourism_event_id' => 'integer',
        'name' => 'string',
        'presenter' => 'string',
        'misc' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tourism_event_id' => 'required',
        'name' => 'required',
        'time' => 'required'
    ];

    
}
