<?php

namespace App\Repositories;

use App\Models\admin_users;
use App\Repositories\BaseRepository;

/**
 * Class admin_usersRepository
 * @package App\Repositories
 * @version August 24, 2019, 12:50 pm UTC
*/

class admin_usersRepository extends BaseRepository
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
        return admin_users::class;
    }
}
