<?php

namespace App\Repositories;

use App\Models\client_users;
use App\Repositories\BaseRepository;

/**
 * Class client_usersRepository
 * @package App\Repositories
 * @version August 24, 2019, 3:12 pm UTC
*/

class client_usersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'username',
        'password',
        'email',
        'remember_token'
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
        return client_users::class;
    }
}
