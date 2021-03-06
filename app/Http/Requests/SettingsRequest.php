<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
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
            'company_name'      => 'required|string',
            'company_zip'       => 'required|max:8',
            'company_address'   => 'required|string',
            'company_tel'       => 'nullable|max:13',
            'company_fax'       => 'nullable|max:13',
            'company_copyright' => 'required|string',
            'about_privacy'     => 'required|string',
            'about_terms'       => 'required|string',
            'company_lat'       => [
                'required',
                'regex:/[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)/u'
            ],
            'company_lng'       => [
                'required',
                'regex:/[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)/u'
            ],
            'email1'            => 'nullable|email',
            'mail_smtp_port'    => 'nullable|max:3',
            'company_email'     => 'nullable|email|max:255',
            'company_logo'      => 'nullable|image|max:1024',

        ];
    }
    
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return array();
//        return [
//            'company_name.required'      => 'Vui lòng nhập tên công ty',
//            'company_zip.required'       => 'Vui lòng nhập mã zip code',
//            'company_address.required'   => 'Vui lòng nhập địa chỉ',
//            'company_copyright.required' => 'Vui lòng nhập bản quyền website',
//            'about_privacy.required'     => 'Vui lòng nhập điều khoản',
//            'about_terms.required'       => 'Vui lòng nhập nội dung điều kiện'
//        ];
    }
    
}
