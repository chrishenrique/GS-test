<?php 

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Commons\CommonRepo as Repo;
use App\Salesman;

/**
 * Salesman repository
 */
class SalesmanRepo extends Repo
{

    /** 
     * Necessary fields to create
     */
    protected $fieldsToCreate = [
        'name',
    ];

    /** 
     * Necessary fields to update
     */
    protected $fieldsToUpdate = [
        'name',
    ];

    /**
     * @param Salesman $model
     */
    public function __construct(Salesman $model)
    {
        $this->model = $model;
    }

  
}