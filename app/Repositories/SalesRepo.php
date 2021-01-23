<?php 

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Commons\CommonRepo as Repo;
use App\Sale;

/**
 * Sale repository
 */
class SalesRepo extends Repo
{

    /** 
     * Necessary fields to create
     */
    protected $fieldsToCreate = [
        'sold_by',
        'total_discounts',
        'status',
    ];

    /** 
     * Necessary fields to update
     */
    protected $fieldsToUpdate = [
        'sold_by',
        'total_discounts',
        'status',
    ];

    /**
     * @param Sale $model
     */
    public function __construct(Sale $model)
    {
        $this->model = $model;
    }

  
}