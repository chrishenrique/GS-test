<?php namespace App\Forms;

use App\Commons\CommonForm;
use App\Enterprise;


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


}
