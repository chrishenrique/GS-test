<?php namespace App\Commons;

use Validator;

/**
 * CommonForm 
 */
abstract class CommonForm {

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Normalize to create a new resource
     * @param  Request  $request
     * @return array
     */
    public function normalizeToCreate($request): array
    {
        $input = $request->all();

        return $this->normalize($input);
    }

    /**
     * Normalize tpdate an existing resource
     * @param  Request $request 
     * @return array
     */
    public function normalizeToUpdate($request, $model = null): array
    {
        $input = $request->all();

        return $this->normalize($input);
    }

    /**
     * Normalize inputs before save resource
     * @param  array $input
     * @return array
     */
    protected function normalize(array $input): array
    {
        return $input;
    }

    /**
     * Validate input data
     * @param  array $input
     * @param  Model $model | null
     * @return Validator
     */
    public function validate(array $input, $model = null)
    {
        $rules = $model ? $model->rules : [];
        $messages = $model ? $model->messages : [];

        return Validator::make($input, $rules, $messages);
    }
}