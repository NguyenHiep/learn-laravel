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
            'company_name'      => 'required',
            'company_zip'       => 'required',
            'company_address'   => 'required',
            'company_copyright' => 'required',
            'about_privacy'     => 'required',
            'about_terms'       => 'required',
        ];
    }
    
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'company_name.required'      => 'Vui lòng nhập tên công ty',
            'company_zip.required'       => 'Vui lòng nhập mã zip code',
            'company_address.required'   => 'Vui lòng nhập địa chỉ',
            'company_copyright.required' => 'Vui lòng nhập bản quyền website',
            'about_privacy.required'     => 'Vui lòng nhập điều khoản',
            'about_terms.required'       => 'Vui lòng nhập nội dung điều kiện'
        ];
    }
    
}
