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
            'receiver_phone_1'      => 'required',
            'payment_id'            => 'required',
        ];
        if(request()->get('receiver_address_type') == APARTMENT)
        {
            $rules['receiver_address_2'] = 'required';
        }
        $rules_buyer = [];
        if(!empty(request()->get('delivery_type')))
        {
            $rules_buyer = [
                'delivery_type'        => 'required',
                'buyer_email'          => 'required|email',
                'buyer_name'           => 'required',
                'buyer_address_type'   => 'required',
                'buyer_address'        => 'required',
                'buyer_address_detail' => 'required',
                'buyer_phone_1'        => 'required',
            ];
            if(request()->get('buyer_address_type') == APARTMENT)
            {
                $rules_buyer['buyer_address_2'] = 'required';
            }
        }
        $rules = array_merge($rules, $rules_buyer);
        return $rules;
    }
}
