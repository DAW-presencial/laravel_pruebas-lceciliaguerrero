<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo' => ['required', 'max:30'],
            'extracto' => ['required', 'max:60'],
            'contenido' => ['required', 'max:100'],
            'acceso' => ['required'],
            'caducable_comentable' => ['required'],
            'fecha' => ['required']
        ];
    }
}
