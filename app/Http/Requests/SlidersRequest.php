<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Model\Sliders;

class SlidersRequest extends FormRequest
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

        $slider_id = $this->route('slider');
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'slider_img'     => 'required|image|max:1024',
                    'slider_title'   => 'required|unique:sliders,slider_title',
                    'slider_content' => 'required',
                    'slider_url'     => 'required|url',
                    'slider_target'  => 'required|numeric',
                    'slider_status'  => 'required|numeric',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'slider_img'     => 'image|max:1024',
                    'slider_title'   => 'required|unique:sliders,slider_title,' . $slider_id,
                    'slider_content' => 'required',
                    'slider_url'     => 'required|url',
                    'slider_target'  => 'required|numeric',
                    'slider_status'  => 'required|numeric',
                ];
            }
            default:
                break;
        }
    }
}
