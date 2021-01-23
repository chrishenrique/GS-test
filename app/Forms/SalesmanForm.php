<?php namespace App\Forms;

use App\Commons\CommonForm;
use App\Salesman;


/**
 * Salesman form
 */
class SalesmanForm extends CommonForm {

    /**
     * Class constructor
     */
    public function __construct(Salesman $model)
    {
        $this->model = $model;
    }


}
