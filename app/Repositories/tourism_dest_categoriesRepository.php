<?php

namespace App\Repositories;

use App\Models\tourism_dest_categories;
use App\Repositories\BaseRepository;

/**
 * Class tourism_dest_categoriesRepository
 * @package App\Repositories
 * @version August 24, 2019, 12:57 pm UTC
*/

class tourism_dest_categoriesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return tourism_dest_categories::class;
    }
}
