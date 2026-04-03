<?php

namespace App\Http\Requests\Publisher;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class DeeplinkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
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
            'landing_url' => 'required|string|url|max:500',
            "sub_id" => "sometimes|nullable|string|max:40",
        ];
    }
}
