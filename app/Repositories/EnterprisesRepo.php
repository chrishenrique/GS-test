<?php 

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Commons\CommonRepo as Repo;
use App\Enterprise;

/**
 * Enterprise repository
 */
class EnterprisesRepo extends Repo
{

    /** 
     * Necessary fields to create
     */
    protected $fieldsToCreate = [
        'name',
        'cep',
        'address',
        'address_2',
        'number',
        'state_code',
        'city_code',
        'construction_value',
        'begin_at',
        'end_at',
    ];

    /** 
     * Necessary fields to update
     */
    protected $fieldsToUpdate = [
        'name',
        'cep',
        'address',
        'address_2',
        'number',
        'state_code',
        'city_code',
        'construction_value',
        'begin_at',
        'end_at',
    ];

    /**
     * @param Enterprise $model
     */
    public function __construct(Enterprise $model)
    {
        $this->model = $model;
    }

  
}