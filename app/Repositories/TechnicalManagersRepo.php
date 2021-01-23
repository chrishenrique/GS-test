<?php 

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Commons\CommonRepo as Repo;
use App\TechnicalManager;

/**
 * TechnicalManager repository
 */
class TechnicalManagersRepo extends Repo
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
     * @param TechnicalManager $model
     */
    public function __construct(TechnicalManager $model)
    {
        $this->model = $model;
    }

  
}