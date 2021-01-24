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
        'client_id',
        'salesman_id',
        'unit_id',
    ];

    /** 
     * Necessary fields to update
     */
    protected $fieldsToUpdate = [
        'sold_by',
        'total_discounts',
        'status',
        'client_id',
        'salesman_id',
        'unit_id',
    ];

    /**
     * @param Sale $model
     */
    public function __construct(Sale $model)
    {
        $this->model = $model;
    }

  
    /**
     * Setup filters on a received query
     * @param QueryBuilder $query
     * @param array $filters
     */
    protected function addFilters($query, array $filters = [], $complete = true)
    {
        foreach ($filters as $field => $value)
        {
            if ($value === null || $value === '')
            {
                continue;
            }
            elseif ($field == 'clientId')
            {
                $query->whereClientId($value);
            }
            elseif ($field == 'salesmanId')
            {
                $query->whereSalesmanId($value);
            }
            elseif ($field == 'beginAt')
            {
                
                $query->whereHas('unit.enterprise', function($q) use ($value)
                {
                    $q->where('begin_at', '=', $value);  
                });
            }
            elseif ($field == 'endAt')
            {
                $query->whereHas('unit.enterprise', function($q) use ($value)
                {
                    $q->where('end_at', '=', $value);  
                });
            }
            elseif($complete)
            {
                $query->where($field, '=', $value);
            }
        }
    }
}