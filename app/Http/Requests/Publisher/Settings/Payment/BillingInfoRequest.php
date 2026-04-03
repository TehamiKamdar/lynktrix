<?php

namespace App\Http\Requests\Publisher\Settings\Payment;

use Illuminate\Foundation\Http\FormRequest;

class BillingInfoRequest extends FormRequest
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
            "name" => "required",
            "phone" => "required",
            "address" => "required",
            "zip_code" => "required",
            "country" => "required",
            "state" => "required",
            "city" => "",
            "company_registration_no" => "",
            "tax_vat_no" => "",
        ];
    }
}
