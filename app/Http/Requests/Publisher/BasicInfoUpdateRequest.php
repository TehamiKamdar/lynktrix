<?php

namespace App\Http\Requests\Publisher;

use Illuminate\Foundation\Http\FormRequest;

class BasicInfoUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "language" => "required",
            "customer_reach" => "required",
            "gender" => "required",
            "dob" => "required",
            "location_country" => "required",
            "location_state" => "required",
            "location_address_1" => "required",
            "location_address_2" => "",
            "zip_code" => "required",
            "intro" => "required",
            "mediakit_image" => "mimes:pdf|max:10240"
        ];
    }

    public function messages()
    {
        return [
            "language" => "The Language Field Is Required",
            "customer_reach" => "The Customer Reach Field Is Required",
            "gender" => "The Gender Field Is Required",
            "dob" => "The DOB Field Is Required",
            "month" => "The Month Field Is Required",
            "day" => "The Day Field Is Required",
            "location_country" => "The Location Country Field Is Required",
            "location_state" => "The Location State Field Is Required",
            "location_city" => "The Location City Field Is Required",
            "location_address_1" => "The Location Address 1 Field Is Required",
            "zip_code" => "The Zip Code Field Is Required",
            "intro" => "The Bio Field Is Required",
            "mediakit_image" => "Max file upload 10 MBS"
        ];
    }
}
