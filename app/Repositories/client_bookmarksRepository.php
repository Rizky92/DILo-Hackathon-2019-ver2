<?php

namespace App\Repositories;

use App\Models\client_bookmarks;
use App\Repositories\BaseRepository;

/**
 * Class client_bookmarksRepository
 * @package App\Repositories
 * @version August 24, 2019, 3:20 pm UTC
*/

class client_bookmarksRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'client_user_id',
        'tourism_dest_id',
        'date',
        'title'
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
        return client_bookmarks::class;
    }
}
