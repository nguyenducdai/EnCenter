<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhoaHocRequest extends FormRequest
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
            "txtDescation"=>"Required",
            "txtContent"=>"Required",
            "txtNumb"=>"Required",
            "txtFile"=>"Required"
        ];
    }

    public function messages()
    {
        return [
              "txtName.required" => "vui lòng nhập tên khóa học",
              "txtDescation.required" => "nhập mô tả",
              "txtContent.required" => "vui lòng nhập nội dung",
              "txtNumb.required" => "vui lòng nhập số học viên",
              "txtFile.required" => "vui lòng chọn anh"
        ];
    }
}
