<?php namespace App\Forms;

use App\Commons\CommonForm;
use App\Unit;


/**
 * Units form
 */
class UnitsForm extends CommonForm {

    /**
     * Class constructor
     */
    public function __construct(Unit $model)
    {
        $this->model = $model;
    }


}
