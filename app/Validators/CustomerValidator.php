<?php

namespace App\Validators;

use Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class CustomerValidator extends LaravelValidator
{

    const RULE_REGISTER_CUSTOMER = 'rule-register-customer';

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'avatar'      => 'nullable|mimes:jpeg,jpg,png|max:1000',
            'first_name'  => 'required|string|max:191',
            'last_name'   => 'required|string|max:191',
            'username'    => 'required|string|max:191|unique:customers',
            'password'    => 'required|string|max:191',
            'phone'       => 'required|max:20',
            'email'       => 'required|max:191|email|unique:customers',
            'gender'      => 'required|integer|min:1|max:2',
            'birthday'    => 'nullable|date|date_format:Y-m-d',
            'address'     => 'nullable|string|max:1000',
            'city_id'     => 'nullable|integer|min:0',
            'district_id' => 'nullable|integer|min:0',
            'status'      => 'required|integer|min:1|max:2'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'avatar'      => 'nullable|mimes:jpeg,jpg,png|max:1000',
            'first_name'  => 'required|string|max:191',
            'last_name'   => 'required|string|max:191',
            'username'    => 'required|string|max:191|unique:customers',
            'password'    => 'nullable|string|max:191',
            'phone'       => 'required|max:20',
            'email'       => 'required|max:191|email|unique:customers',
            'gender'      => 'required|integer|min:1|max:2',
            'birthday'    => 'nullable|date|date_format:Y-m-d',
            'address'     => 'nullable|string|max:1000',
            'city_id'     => 'nullable|integer|min:0',
            'district_id' => 'nullable|integer|min:0',
            'status'      => 'required|integer|min:1|max:2'
        ],
        self::RULE_REGISTER_CUSTOMER => [
            'first_name'  => 'required|string|max:191',
            'last_name'   => 'required|string|max:191',
            'username'    => 'required|string|max:191|unique:customers',
            'password'    => 'required|string|max:191|confirmed',
            'phone'       => 'required|max:20',
            'email'       => 'required|max:191|email|unique:customers',
            'gender'      => 'required|integer|min:1|max:2',
            'birthday'    => 'nullable|date|date_format:Y-m-d',
            'address'     => 'nullable|string|max:1000',
            'city_id'     => 'nullable|integer|min:0',
            'district_id' => 'nullable|integer|min:0',
            'status'      => 'required|integer|min:1|max:2',
            //'captcha'     => 'required|captcha'
        ]
    ];

}