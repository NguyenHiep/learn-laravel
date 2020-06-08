<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'avatar'      => 'nullable|image|mimes:jpeg,jpg,png|max:1000',
            'first_name'  => 'required|string|max:255',
            'last_name'   => 'required|string|max:255',
            'phone'       => 'required|string|min:10|max:10',
            'email'       => 'required|email|max:255|unique:users',
            'address'     => 'required|string',
            'city_id'     => 'required|exists:locations,code',
            'district_id' => 'required|exists:provinces,code',
            'gender'      => 'required|integer|min:1|max:2',
            'birthday'    => 'required|date|date_format:Y-m-d',
            'password'    => 'nullable|min:6|confirmed'
        ];
    }
}
