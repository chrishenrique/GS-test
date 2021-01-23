<?php 

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Commons\CommonRepo as Repo;
use App\Client;

/**
 * Client repository
 */
class ClientsRepo extends Repo
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
     * @param Client $model
     */
    public function __construct(Client $model)
    {
        $this->model = $model;
    }

  
}