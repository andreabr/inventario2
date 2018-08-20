<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class MonitorValidator.
 *
 * @package namespace App\Validators;
 */
class MonitorValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'sector_id' => 'required',
            'manufacturer' => 'required',
            'model' => 'required',
            'screen_size' => 'required',
            'status' => 'required',
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
