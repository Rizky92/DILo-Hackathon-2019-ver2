<?php

namespace App\Repositories;

use App\Models\tourism_serv_prod_categories;
use App\Repositories\BaseRepository;

/**
 * Class tourism_serv_prod_categoriesRepository
 * @package App\Repositories
 * @version August 24, 2019, 12:58 pm UTC
*/

class tourism_serv_prod_categoriesRepository extends BaseRepository
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
        return tourism_serv_prod_categories::class;
    }
}
