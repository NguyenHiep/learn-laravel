<?php

namespace App\Validators;

use Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class RoleValidator extends LaravelValidator
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name'         => 'required|string|max:191|unique:roles',
            'permission'   => 'required|array',
            'permission.*' => 'required|integer|min:0',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name'         => 'required|string|max:191|unique:roles',
            'permission'   => 'required|array',
            'permission.*' => 'required|integer|min:0'
        ]
    ];

}