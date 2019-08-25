<?php

namespace App\Repositories;

use App\Models\client_scores;
use App\Repositories\BaseRepository;

/**
 * Class client_scoresRepository
 * @package App\Repositories
 * @version August 24, 2019, 4:26 pm UTC
*/

class client_scoresRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'client_user_id',
        'total'
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
        return client_scores::class;
    }
}
