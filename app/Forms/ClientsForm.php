<?php namespace App\Forms;

use App\Commons\CommonForm;
use App\Client;
use Validator;


/**
 * Clients form
 */
class ClientsForm extends CommonForm {

    /**
     * Class constructor
     */
    public function __construct(Client $model)
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
