<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ComputerValidator.
 *
 * @package namespace App\Validators;
 */
class ComputerValidator extends LaravelValidator
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
            'processor' => 'required',
            'memory_capacity' => 'required',
            'hard_disk_capacity' => 'required',
            'operacional_system' => 'required',
            'sys_op_architecture' => 'required',
            'licensed' => 'required',
            'status' => 'required',
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
