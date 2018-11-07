<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaCreateRequest extends FormRequest
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
            'descricao' => 'required|max:100|unique:categorias'
        ];
    }

    public function messages()
    {
        return [
            'descricao.required' => 'Por favor informe uma descricao.',
            'descricao.max' => 'Digite um nome menor para a categoria',
            'descricao.unique' => 'Já existe uma categoria cadastrada com o nome informado'
        ];
    }
}
