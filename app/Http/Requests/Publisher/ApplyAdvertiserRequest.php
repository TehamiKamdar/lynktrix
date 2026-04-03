<?php

namespace App\Http\Requests\Publisher;

use Illuminate\Foundation\Http\FormRequest;

class ApplyAdvertiserRequest extends FormRequest
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
            "a_id"    => "required",
            "message" => "",
            "sub_id" => ['max:40'],
        ];
    }

    public function messages()
    {
        return [
            "a_id"    => "Advertiser Id Is Required",
            "message" => "",
            "sub_id" => ""
        ];
    }
}
