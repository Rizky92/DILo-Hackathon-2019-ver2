<?php

namespace App\Repositories;

use App\Models\tourism_serv_prods;
use App\Repositories\BaseRepository;

/**
 * Class tourism_serv_prodsRepository
 * @package App\Repositories
 * @version August 24, 2019, 2:34 pm UTC
*/

class tourism_serv_prodsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tourism_dest_id',
        'tourism_serv_prod_cat_id',
        'name',
        'price',
        'is_available',
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
        return tourism_serv_prods::class;
    }
}
