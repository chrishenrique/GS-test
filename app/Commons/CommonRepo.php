<?php namespace App\Commons;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * CommomRepo 
 */
abstract class CommonRepo {

    public function __construct(
        Model $model
        )
    {
        $this->model = $model;
    }

    /**
     * Fetch records by page.
     * @param array $filters
     * @param mixed $limit
     * @return LengthAwarePaginator
     */
    public function byPage($filters = [], $limit = 20): LengthAwarePaginator
    {
        $base = $this->model->newQuery();
        $this->addFilters($base, $filters);

        $model = clone $base;

        $collect = $model->orderBy('created_at', 'desc')->paginate($limit);
        $collect->appends($filters);

        return $collect;
    }

    /**
     * Fetch records by filter.
     * @param array $filters
     * @param mixed $limit
     * @return Builder
     */
    public function byFilter($filters = []): Builder
    {
        $base = $this->model->newQuery();
        $this->addFilters($base, $filters);

        $model = clone $base;

        $collect = $model->orderBy('created_at', 'desc');

        return $collect;
    }

    /**
     * Create a new resource
     *
     * @param array $input
     * @return Model
     */
    public function create(array $input)
    {
        $attrs = array_only($input, $this->fieldsToCreate);

        $model = new $this->model($attrs);
        if (!$model->save())
        {
            return null;
        };

        return $model;
    }

    /**
     * Update a resource
     *
     * @param array $input
     * @param Model $model
     * @return Model
     */
    public function update(array $input, Model $model)
    {   
        $attrs = array_only($input, $this->fieldsToUpdate);

        $model->fill($attrs);
        if (!$model->save())
        {
            return null;
        };

        return $model;
    }

    /**
     * Delete a model
     *
     * @param Model $model
     * @param bool $force
     * @return boolean
     */
    public function delete(Model $model, $force = false): bool
    {
        try
        {
            if (!$force)
            {
                $model->delete();
            }
            else
            {
                $model->forceDelete();
            };
    
            return true;
        }
        catch (Exception $e)
        {
            return false;
        }
    }

    /**
     * Search by term
     *
     * @param string $term
     * @return json
     */
    public function search($term, $field = 'name')
    {
        $base = $this->model->newQuery();

        if (!empty($term['term']))
        {
            $base->where($field, 'like', "%{$term['term']}%");
        }

        $models = clone $base;
        $models = $models->orderBy($field, 'desc')->limit(20);

        return $models->get()->toJson();
    }

    /**
     * Syncronize relation
     * @param Model $parent
     * @param array $collection
     * @param StdClass $data
     * @return boolean
     */
    protected function sync($relation, $model, $collection, array $data)
    {
        // dd($collection);
        if(is_null($collection)) return;
        
        $model->$relation()->detach();

        foreach ($collection as $index => $item)
        {
            if(!$item) continue;
            
            $model->$relation()->attach($item);
        }

        return true;
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
            elseif ($field == 'term')
            {
                $query->where('name', 'like', "%{$value}%");
            }
            elseif ($field == 'first')
            {
                $query->where('name', 'like', "{$value}%");
            }
            elseif($complete)
            {
                $query->where($field, '=', $value);
            }
        }
    }

}