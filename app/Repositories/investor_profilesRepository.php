<?php

namespace App\Repositories;

use App\Models\investor_profiles;
use App\Repositories\BaseRepository;

/**
 * Class investor_profilesRepository
 * @package App\Repositories
 * @version August 24, 2019, 4:23 pm UTC
*/

class investor_profilesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'address',
        'coords',
        'ceo_name',
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
        return investor_profiles::class;
    }
}
