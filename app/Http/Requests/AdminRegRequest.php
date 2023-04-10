<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRegRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'login'=>['required','regex:/^[a-z\d\-]+$/i', 'unique:admins'],
            'password'=>['required','regex:/^[a-z\d\-]{6,}$/i','confirmed'],
//
        ];
    }
    //сообщения для пользователей об ошибках
    public function messages()
    {
        return [
//            'name.required' => 'Имя обязательно для заполнения'
            'required'=>':attribute "Обязательно для заполнения"',
            //'unique'=>':attribute "Должно быть уникальным"',
            'regex'=>':attribute "Не соотвтетствует шаблону"',
            'confirmed'=>"Пароли не совпадают",
        ];
    }
//перевод названий полей
    public function attributes()
    {
        return [
            'login'=>'логин',
            'password'=>'пароль',

        ];
    }
}
