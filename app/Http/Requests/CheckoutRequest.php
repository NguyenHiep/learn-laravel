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
            'receiver_name'         => 'required|string',
            'receiver_address_type' => 'required',
            'receiver_address_1'    => 'required|string',
            'receiver_phone_1'      => 'required',
            'payment_id'            => 'required',
        ];
        if (request()->input('receiver_address_type') == config('define.APARTMENT')) {
            $rules['receiver_address_2'] = 'required';
        }
        $rules_buyer = [];
        if (!empty(request()->input('delivery_type'))) {
            $rules_buyer = [
                'delivery_type'      => 'required',
                'buyer_email'        => 'required|email',
                'buyer_name'         => 'required|string',
                'buyer_address_type' => 'required',
                'buyer_address'      => 'required|string',
                'buyer_phone_1'      => 'required',
            ];
            if (request()->input('buyer_address_type') == config('define.APARTMENT')) {
                $rules_buyer['buyer_address_2'] = 'required';
            }
        }

        $rules = array_merge($rules, $rules_buyer);
        return $rules;
    }

    /****
     * Mapping data request order
     *
     * @return array
     */
    public function validationData()
    {
        $billing = $this->input('billing', []);
        $different_address = $this->input('different_address', false);
        $data = [
            'receiver_email'        => $billing['customer_email'],
            'receiver_name'         => $billing['full_name'],
            'receiver_address_type' => 1, //TODO: Need change
            'receiver_address_1'    => $billing['address'],
            'receiver_phone_1'      => $billing['customer_phone'],
            'payment_id'            => 1, //TODO: Need change
            'note'                  => $billing['notes'],
            'delivery_type'         => 1 //TODO: Need change
        ];

        $dataBuyer = [];
        if ($different_address) {
            $data['delivery_type'] = 2; //TODO: Need change
            $shipping = $this->input('shipping', []);
            $dataBuyer = [
                'delivery_type'      => 2, //TODO: Need change
                'buyer_email'        => $shipping['customer_email'] ?? null,
                'buyer_name'         => $shipping['full_name'],
                'buyer_address_type' => 1, //TODO: Need change
                'buyer_address'      => $shipping['address'],
                'buyer_phone_1'      => $shipping['phone'],
            ];
        }
        $data = array_merge($data, $dataBuyer);
        return $data;
    }
}
