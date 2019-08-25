<?php

namespace App\Repositories;

use App\Models\tourism_events;
use App\Repositories\BaseRepository;

/**
 * Class tourism_eventsRepository
 * @package App\Repositories
 * @version August 24, 2019, 2:16 pm UTC
*/

class tourism_eventsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return tourism_events::class;
    }
}
