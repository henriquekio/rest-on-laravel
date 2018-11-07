<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarefaCreateRequest extends FormRequest
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
            'descricao' => 'required|min:10',
            'data_conclusao' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'descricao.required' => 'Descricao da tarefa não pode ser vazia',
            'descricao.min' => 'Descrição precisa ter no minimo 10 caracteres',
            'data_conclusao' => 'Data conclusão precisa ser preenchida'
        ];
    }
}
