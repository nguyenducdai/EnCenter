<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
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
            "txtHinhAnh"=>"Required|Image",
            "txtStatus"=>"Required"
        ];
    }

    public function messages()
    {
        return [
            "txtHinhAnh.required" => "vui lòng chọn hình ảnh",
            "txtHinhAnh.Image" => "định dạng không hợp lệ",
            "txtStatus.required" => "vui lòng chọn trang thái",

        ];
    }
}
