<?php

namespace App\Repositories;

use App\Models\tourism_reports;
use App\Repositories\BaseRepository;

/**
 * Class tourism_reportsRepository
 * @package App\Repositories
 * @version August 24, 2019, 1:11 pm UTC
*/

class tourism_reportsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tourism_dest_id',
        'target',
        'num_of_res',
        'num_of_visits',
        'income',
        'costs',
        'profit'
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
        return tourism_reports::class;
    }
}
