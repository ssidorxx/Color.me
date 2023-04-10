<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>['required','min:3'],
            'price'=>['required','numeric'],
            'count'=>['required','numeric'],
            'description'=>['required','min:3'],

        ];
    }
    public function messages()
    {
        return [
            'required'=>':attribute "Обязательно для заполнения"',
            'numeric'=>'Необходимо ввести числовое значение',
            "min"=>'Минимальная длина поля :attribute : :min'
        ];
    }
//перевод названий полей
    public function attributes()
    {
        return [
            'name'=>'Название',
            'price'=>'Цена',
            'count'=>'Количество',
            'description'=>'Описание',
        ];
    }
}
