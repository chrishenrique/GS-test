<?php namespace App\Forms;

use App\Commons\CommonForm;
use App\Enterprise;
use Validator;


/**
 * Enterprises form
 */
class EnterprisesForm extends CommonForm {

    /**
     * Class constructor
     */
    public function __construct(Enterprise $model)
    {
        $this->model = $model;
    }

    /**
     * Normalize inputs before save
     * @param  array $input
     * @return array
     */
    protected function normalize(array $input): array
    {
        // dd($input);
        // $input['begin_at'] && $input['begin_at'] = str_replace('00:00:00', " ");
        // $input['end_at'] && $input['end_at'] = str_replace('00:00:00', " ");

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
        if ($model) 
        {
            $rules['name'] = $rules['name'].','.$model->id;
        }
        $messages = $model ? $model->messages : [];

        return Validator::make($input, $rules, $messages);
    }
}
