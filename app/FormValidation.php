<?php

namespace App;

use Illuminate\Foundation\Http\FormRequest;

class FormValidation extends FormRequest
{
    const VALIDATION_TYPE_CREATE = 0;
    const VALIDATION_TYPE_EDIT   = 1;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }



}