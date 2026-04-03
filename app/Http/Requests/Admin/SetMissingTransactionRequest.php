<?php

namespace App\Http\Requests\Admin;

use App\Helper\Static\Methods;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class SetMissingTransactionRequest extends FormRequest
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
            "transaction_id" => "required",
            "publisher" => "required",
            "website" => "required",
        ];
    }
}
