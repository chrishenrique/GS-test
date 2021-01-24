<?php namespace App\Forms;

use App\Commons\CommonForm;
use App\TechnicalManager;
use Validator;

/**
 * TechnicalManagers form
 */
class TechnicalManagersForm extends CommonForm {

    /**
     * Class constructor
     */
    public function __construct(TechnicalManager $model)
    {
        $this->model = $model;
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
