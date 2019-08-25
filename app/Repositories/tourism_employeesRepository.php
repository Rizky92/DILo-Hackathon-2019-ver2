<?php

namespace App\Repositories;

use App\Models\tourism_employees;
use App\Repositories\BaseRepository;

/**
 * Class tourism_employeesRepository
 * @package App\Repositories
 * @version August 24, 2019, 1:09 pm UTC
*/

class tourism_employeesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tourism_dest_id',
        'nama',
        'tgl_lahir',
        'jk',
        'alamat',
        'tel',
        'email',
        'jabatan'
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
        return tourism_employees::class;
    }
}
