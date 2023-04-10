<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{

    public function rules()
    {
        return [
            'category'=>['unique:categories', 'required', 'min:3'],
        ];
    }
    public function messages()
    {
        return [
            'unique'=>':attribute "должно быть уникальным"',
            'required'=>':attribute "обязательно для заполнения"',
            "min"=>'Минимальная длина поля :attribute : :min'
        ];
    }
//перевод названий полей
    public function attributes()
    {
        return [
            'category'=>'Название',
        ];
    }

}
