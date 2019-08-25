<?php

namespace App\Repositories;

use App\Models\rewards;
use App\Repositories\BaseRepository;

/**
 * Class rewardsRepository
 * @package App\Repositories
 * @version August 24, 2019, 4:15 pm UTC
*/

class rewardsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
        'reward_token'
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
        return rewards::class;
    }
}
