<?php

namespace App\Repositories;

use App\Models\missions;
use App\Repositories\BaseRepository;

/**
 * Class missionsRepository
 * @package App\Repositories
 * @version August 24, 2019, 4:17 pm UTC
*/

class missionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'length',
        'points',
        'mission_key'
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
        return missions::class;
    }
}
