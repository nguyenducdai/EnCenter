<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCatRequest extends FormRequest
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
            "txtName"=>"Required|unique:danhmuc,name",
        ];
    }

     public function messages()
    {
        return [
              "txtName.required" => "vui lòng nhập tên danh mục tin",
        ];
    }
}
