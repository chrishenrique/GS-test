<?php namespace App\Forms;

use App\Commons\CommonForm;
use App\Client;


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


}
