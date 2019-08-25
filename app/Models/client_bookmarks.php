<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class client_bookmarks
 * @package App\Models
 * @version August 24, 2019, 3:20 pm UTC
 *
 * @property integer client_user_id
 * @property integer tourism_dest_id
 * @property string date
 * @property string title
 */
class client_bookmarks extends Model
{
    use SoftDeletes;

    public $table = 'client_bookmarks';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'client_user_id',
        'tourism_dest_id',
        'date',
        'title'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'client_user_id' => 'integer',
        'tourism_dest_id' => 'integer',
        'date' => 'date',
        'title' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'client_user_id' => 'required',
        'tourism_dest_id' => 'required',
        'date' => 'required'
    ];

    
}
