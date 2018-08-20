<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class PrinterValidator.
 *
 * @package namespace App\Validators;
 */
class PrinterValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'sector_id' => 'required',
            'type' => 'required',
            'manufacturer' => 'required',
            'model' => 'required',
            'tonner' => 'required',
            'status' => 'required',
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
