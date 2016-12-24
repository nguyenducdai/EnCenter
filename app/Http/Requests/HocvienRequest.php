<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HocvienRequest extends FormRequest
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
            "txtEdress"=>"Required",
            "txtDate"=>"Required",
            "txtCaree"=>"Required",
            "txtPhone"=>"Required",
        ];
    }

    public function messages()
    {
        return [
              "txtName.required" => "vui lòng nhập họ và tên",
              "txtEdress.required" => "vui lòng nhập địa chỉ",
              "txtDate.required" => "vui lòng nhập ngày sinh",
              "txtCaree.required" => "vui lòng nhập tên nghề nghiệp",
              "txtPhone.required" => "vui lòng nhập số điện thoại"
        ];
    }
}
