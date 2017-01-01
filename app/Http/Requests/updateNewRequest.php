<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateNewRequest extends FormRequest
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
            "txtDescaption"=>"Required",
            "txtContent"=>"Required",
            "txtDanhMuc"=>"Required"
        ];
    }

    public function messages()
    {
        return [
              "txtName.required" => "vui lòng nhập tên bài viết",
              "txtDescaption.required" => "vui lòng nhập mô tả bài viết",
              "txtContent.unique" => "vui lòng nhập nội dung bài viết",
              "txtDanhMuc.required" => "vui lòng chọn danh mục bài viêt"
        ];
    }
}
