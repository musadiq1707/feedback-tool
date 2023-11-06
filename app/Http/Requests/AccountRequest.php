<?php

namespace App\Http\Requests;


class AccountRequest extends CustomFormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'confirm-password' => 'same:password',
        ];
    }
    public function messages()
    {
        return [

        ];
    }
}
