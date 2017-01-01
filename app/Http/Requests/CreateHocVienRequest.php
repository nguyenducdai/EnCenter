<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateHocVienRequest extends FormRequest
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
            "txtEmail"=>"Required|unique:hocvien,email",
            "txtNumb"=>"Required",
            "txtDate"=>"Required",
            "txtAdress"=>"Required",
            "txtKhoaHoc"=>"Required",
        ];
    }

     public function messages()
    {
        return [
              "txtName.required" => "vui lòng nhập họ và tên",
              "txtEmail.required" => "vui lòng nhập địa chỉ mail",
              "txtEmail.unique" => "email này đã tồn tại",
              "txtNumb.required" => "vui lòng nhập số điện thoại",
              "txtDate.required" => "vui lòng nhập ngày sinh",
              "txtAdress.required" => "vui lòng địa chỉ nơi ở ",
              "txtKhoaHoc.required" => "vui lòng chọn khóa học ",
        ];
    }
}
