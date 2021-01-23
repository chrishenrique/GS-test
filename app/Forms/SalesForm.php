<?php namespace App\Forms;

use App\Commons\CommonForm;
use App\Sale;
use App\Util\Number;
use Arr;

/**
 * Sales form
 */
class SalesForm extends CommonForm {

    /**
     * Class constructor
     */
    public function __construct(Sale $model)
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
        $input['total_value'] = Number::fromMoneyApp(Arr::get($input, 'total_value', 0));

        

        return $input;
    }

}
