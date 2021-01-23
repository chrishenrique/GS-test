<?php namespace App\Forms;

use App\Commons\CommonForm;
use App\TechnicalManager;


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


}
