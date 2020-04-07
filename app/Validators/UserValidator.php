<?php

namespace App\Validators;

use Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UserValidator extends LaravelValidator
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'avatar'   => 'nullable|mimes:jpeg,jpg,png|max:1000',
            'username' => 'required|string|max:191|unique:users',
            'password' => 'required|string|max:191',
            'email'    => 'required|max:191|email|unique:users',
            'level'    => 'required|integer|min:1|max:3',
            'roles'    => 'required|string|exists:roles,name',
            'status'   => 'required|integer|min:1|max:2'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'avatar'   => 'nullable|mimes:jpeg,jpg,png|max:1000',
            'username' => 'required|string|max:191|unique:users',
            'password' => 'nullable|string|max:191',
            'email'    => 'required|max:191|email|unique:users',
            'level'    => 'required|integer|min:1|max:3',
            'roles'    => 'required|string|exists:roles,name',
            'status'   => 'required|integer|min:1|max:2'
        ]
    ];

}