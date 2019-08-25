<?php

namespace App\Repositories;

use App\Models\client_reviews;
use App\Repositories\BaseRepository;

/**
 * Class client_reviewsRepository
 * @package App\Repositories
 * @version August 24, 2019, 3:38 pm UTC
*/

class client_reviewsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'client_user_id',
        'date',
        'tourism_dest_id',
        'satisfactory_level',
        'comment'
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
        return client_reviews::class;
    }
}
