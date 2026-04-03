<?php

namespace App\Http\Requests\Auth\Register;

use Illuminate\Foundation\Http\FormRequest;

class PublisherStepTwoRequest extends FormRequest
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
            'company_name' => ['required', 'string', 'max:191'],
            'entity_type' => ['required', 'string', 'max:191'],
            'contact_name' => ['required', 'string', 'max:191'],
            'phone_number' => ['required', 'string', 'max:191'],
            'country' => ['required', 'string', 'max:191'],
            'state' => ['required', 'string', 'max:191'],
            'postal_code' => ['required', 'string', 'max:191'],
            'address' => ['required', 'string', 'max:191'],
        ];
    }
}
