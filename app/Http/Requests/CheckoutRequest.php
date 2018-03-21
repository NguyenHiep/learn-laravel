<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
        $rules = [
            'receiver_email'        => 'required|email',
            'receiver_name'         => 'required',
            'receiver_address_type' => 'required',
            'receiver_address_1'    => 'required',
            'receiver_address_2'    => 'required',
            'receiver_phone_1'      => 'required',
            'payment_id'            => 'required',
        ];
        return $rules;
    }
}
