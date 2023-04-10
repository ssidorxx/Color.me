<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'login'=>'required|exists:users',
            'password'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'required'=>'":attribute" - обязательно для заполнения',
        ];
    }

    public function attributes()
    {
        return [
            'login'=>'логин',
            'password'=>'пароль',
        ];
    }
}
