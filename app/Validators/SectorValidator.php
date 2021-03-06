<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class SectorValidator.
 *
 * @package namespace App\Validators;
 */
class SectorValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'initials' => 'required|unique:sectors',
            'in_full' => 'required',
         
        ],
        ValidatorInterface::RULE_UPDATE => [
            'initials' => 'required',
            'in_full' => 'required',
        ],
    ];
}
