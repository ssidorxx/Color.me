<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
//    /**
//     * Determine if the user is authorized to make this request.
//     *
//     * @return bool
//     */
//    public function authorize()
//    {
//        //все авторизованные пользователи имеют право работать с этим
//        return true;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    //правила ввода сообщений
    public function rules()
    {
        return [
            'name'=>['required','regex:/^[а-яё\s\-]+$/iu'],
            'login'=>['required','regex:/^[a-z\d\-]+$/i', 'unique:users'],
            'password'=>['required','regex:/^[a-z\d\-]{6,}$/i','confirmed'],
//            'email'=>'required|email'
            'email'=>['required', 'email', 'unique:users'],
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
            'email'=>"Введен некорректно",
            'confirmed'=>"Пароли не совпадают",
        ];
    }
//перевод названий полей
    public function attributes()
    {
        return [
            'name'=>'имя',
            'login'=>'логин',
            'password'=>'пароль',

        ];
    }
}
