<?php 

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Commons\CommonRepo as Repo;
use App\Unit;

/**
 * Unit repository
 */
class UnitsRepo extends Repo
{

    /** 
     * Necessary fields to create
     */
    protected $fieldsToCreate = [
        'name',
        'unit_number',
        'total_area',
        'private_area',
        'roof_area',
        'has_roof',
        'sale_value',
        'bank_appraisal_value',
    ];

    /** 
     * Necessary fields to update
     */
    protected $fieldsToUpdate = [
        'name',
        'unit_number',
        'total_area',
        'private_area',
        'roof_area',
        'has_roof',
        'sale_value',
        'bank_appraisal_value',
    ];

    /**
     * @param Unit $model
     */
    public function __construct(Unit $model)
    {
        $this->model = $model;
    }

  
}