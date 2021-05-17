<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'code' => 'required|min:3|max:255|unique:genres,code',
            'name' => 'required|min:3|max:255',
        ];
        if ($this->route()->named('genres.update')) {
            $rules['code'] .= ',' . $this->route()->parameter('genre')->id;
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
