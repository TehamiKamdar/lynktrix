<?php

namespace App\Http\Requests\Admin;

use App\Helper\Static\Methods;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class ApiAdvertiserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Methods::getAdminAuthorizeCheck();
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
            "url" => "required",
            "primary_region" => "required",
            "currency_code" => "required",
            "average_payment_time" => "required",
            "validation_days" => "required",
            "epc" => "required",
            "deeplink_enabled" => "required",
            "supported_regions" => "required",
            "categories" => "required",
            "promotional_methods" => "required",
            "program_restrictions" => "required",
            "tags" => "required",
            "offer_type" => "required",
            "click_through_url" => "required",
            "tracking_url_short" => "required",
            "commissions.*.commission_id" => "",
            "commissions.*.date" => "required",
            "commissions.*.condition" => "required",
            "commissions.*.rate" => "required",
            "commissions.*.type" => "required",
            "commissions.*.info" => "required",
            "validations.*.domain" => "required",
            "program_policies" => "required",
            "description" => "required",
            "logo" => "",
        ];
    }
}
