<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class tourism_dest_categories
 * @package App\Models
 * @version August 24, 2019, 12:57 pm UTC
 *
 * @property string name
 */
class tourism_dest_categories extends Model
{
    use SoftDeletes;

    public $table = 'tourism_dest_categories';
    

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
