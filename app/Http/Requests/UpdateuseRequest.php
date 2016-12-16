<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateuseRequest extends FormRequest
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
            "txtName"=>"Required",
            "txtMail"=>"Required|email",
            "txtPass"=>"Required"
        ];
    }

     public function messages()
    {
        return [
              "txtName.required" => "vui lòng nhập tên đăng nhập",
              "txtMail.required" => "nhập địa chỉ mail",
              "txtPass.required" => "vui lòng nhập lại mật khẩu"
        ];
    }
}
