<?php

namespace App\Repositories;

use App\Models\tourism_destinations;
use App\Repositories\BaseRepository;

/**
 * Class tourism_destinationsRepository
 * @package App\Repositories
 * @version August 24, 2019, 1:03 pm UTC
*/

class tourism_destinationsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return tourism_destinations::class;
    }
}
