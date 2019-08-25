<?php

namespace App\Repositories;

use App\Models\client_transactions;
use App\Repositories\BaseRepository;

/**
 * Class client_transactionsRepository
 * @package App\Repositories
 * @version August 24, 2019, 4:31 pm UTC
*/

class client_transactionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'client_user_id',
        'tourism_serv_prod_id',
        'time',
        'quantity'
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
        return client_transactions::class;
    }
}
