<?php

namespace App\Repositories;

use App\Models\client_histories;
use App\Repositories\BaseRepository;

/**
 * Class client_historiesRepository
 * @package App\Repositories
 * @version August 24, 2019, 4:48 pm UTC
*/

class client_historiesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'client_user_id',
        'tourism_dest_id',
        'time'
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
        return client_histories::class;
    }
}
