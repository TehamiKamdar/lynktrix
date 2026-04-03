<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
//        abort_if(Gate::denies('crm_user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'first_name'        => [
                'required',
            ],
            'last_name'         => [
                'required',
            ],
            'email'             => [
                'required',
            ],
            'user_name'         => [
                'required',
            ],
            'password' => 'required|min:5',
            'confirm_password' => 'required|min:5|same:password',
            'roles'             => [
                'required',
            ],
        ];
    }
}
