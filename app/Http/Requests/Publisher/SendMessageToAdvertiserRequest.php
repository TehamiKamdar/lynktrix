<?php

namespace App\Http\Requests\Publisher;

use Illuminate\Foundation\Http\FormRequest;

class SendMessageToAdvertiserRequest extends FormRequest
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
            "advertiser_id"         =>      "required",
            "advertiser_name"       =>      "required",
            "subject"               =>      "required",
            "question_or_comment"   =>      "required",
        ];
    }

    public function messages()
    {
        return [
            "advertiser_id"         =>      "Advertise Is Required.r",
            "advertiser_name"       =>      "Advertise Name Is Required",
            "subject"               =>      "Subject Is Required",
            "question_or_comment"   =>      "Question / Comments / Message Is Required",
        ];
    }
}
