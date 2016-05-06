<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewImageRequest extends Request
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
            "carousel_image" => "required|image|max:10000",
            "client_name" => "required",
            "description" => "required",
            "custom_text_1" => "required",
            "custom_text_2" => "required",
            "start_date" => "required|date_format:Y-m-d"
        ];
    }
}
