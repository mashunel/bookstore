<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'code' => 'required|min:3|max:255|unique:books,code',
            'name' => 'required|min:3|max:255',
            'price' => 'required|numeric|min:1'
        ];
        if ($this->route()->named('books.update')) {
            $rules['code'] .= ',' . $this->route()->parameter('books')->id;
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязательно для ввода',
            'min' => 'Поле :attribute должно иметь минимум :min символов',
            'unique' => 'Поле :attribute должно быть уникальным',
        ];
    }
}
