<?php

namespace App\Repositories;

use App\Models\tourism_event_committees;
use App\Repositories\BaseRepository;

/**
 * Class tourism_event_committeesRepository
 * @package App\Repositories
 * @version August 24, 2019, 2:21 pm UTC
*/

class tourism_event_committeesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tourism_event_id',
        'name',
        'role',
        'tel',
        'email'
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
        return tourism_event_committees::class;
    }
}
