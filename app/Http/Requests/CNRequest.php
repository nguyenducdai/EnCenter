<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CNRequest extends FormRequest
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
            "txtContent"=>"Required|Max:400",
           
        ];
    }

      public function messages()
    {
        return [
              "txtContent.required" => "vui lòng nhập Nội Dung",
              "txtContent.max" => "Nội dung quá dài",

        ];
    }
}
