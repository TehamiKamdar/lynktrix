<?php

namespace App\Http\Requests\Auth\Register;

use Illuminate\Foundation\Http\FormRequest;

class PublisherStepThreeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'website_url' => ['required', 'string', 'url', 'max:191'],
            'brief_introduction' => ['required', 'string'],
            'categories' => ['required', 'array'],
            'partner_types' => ['required', 'array'],
            'website_country' => ['required', 'string', 'max:191'],
            'monthly_traffic' => ['required', 'string', 'max:191'],
            'monthly_page_views' => ['required', 'string', 'max:191'],
        ];
    }
}
