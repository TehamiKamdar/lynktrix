<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StoreRoleRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('admin_roles_users_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'title'         => [
                'required',
            ],
            'permissions.*' => [
                'string',
            ],
            'permissions'   => [
                'required',
                'array',
            ],
        ];
    }
}
