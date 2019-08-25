<?php

namespace App\Repositories;

use App\Models\admin_reset_passwords;
use App\Repositories\BaseRepository;

/**
 * Class admin_reset_passwordsRepository
 * @package App\Repositories
 * @version August 24, 2019, 12:52 pm UTC
*/

class admin_reset_passwordsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'email',
        'reset_token'
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
        return admin_reset_passwords::class;
    }
}
