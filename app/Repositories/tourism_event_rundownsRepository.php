<?php

namespace App\Repositories;

use App\Models\tourism_event_rundowns;
use App\Repositories\BaseRepository;

/**
 * Class tourism_event_rundownsRepository
 * @package App\Repositories
 * @version August 24, 2019, 2:47 pm UTC
*/

class tourism_event_rundownsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tourism_event_id',
        'name',
        'time',
        'presenter',
        'misc'
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
        return tourism_event_rundowns::class;
    }
}
