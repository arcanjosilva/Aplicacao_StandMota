<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditMarcaRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            'nome'=>'required',
            'img' =>'image|mimes:png,jpg,jpeg,gif|max:2048'

        ];
    }

    public function messages()
    {
        return [
            'nome.required' => "O Nome da Marca é Obrigatório",
            'img.img' => "A Imagem deve ser uma imagem",
            "img.mimes" => "A imagem pode ser jpeg,png,jpg,gif.",
            "img.max" => "A imagem não pode exceder 2MB",
        ];
    }
}
