<?php

namespace App\Repositories;

use App\Models\client_profiles;
use App\Repositories\BaseRepository;

/**
 * Class client_profilesRepository
 * @package App\Repositories
 * @version August 24, 2019, 3:17 pm UTC
*/

class client_profilesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'tgl_lahir',
        'jk',
        'alamat',
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
        return client_profiles::class;
    }
}
