<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\CustomFormRequest;

class UserRequest extends CustomFormRequest
{
    public function rules()
    {
        if ($this->getMethod() == 'PATCH')
        {
            $id = $this->user->getAttribute('id');
            $email = 'unique:users,email,' . $id . ',id';
            $password = '';
            $cpassword = 'required_with:password|same:password';

        } else {
            $email = 'unique:users';
            $password = 'required';
            $cpassword = 'required|same:password';
        }

        return [
            'name' => 'required',
            'email' => 'required|'.$email,
            'password' => $password,
            'confirm-password' => $cpassword,
        ];
    }
    public function messages()
    {
        return [

        ];
    }
}
