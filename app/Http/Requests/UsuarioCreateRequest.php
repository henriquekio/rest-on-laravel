<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioCreateRequest extends FormRequest
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
            "name" => 'required|unique:usuarios,name',
            "email" => "required|email|unique:usuarios,email",
            "password" => "required|confirmed"
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Por favor informe o nome para o usuário",
            "name.unique" => "Usuário já cadastrado, por favor escolha um outro nome",
            "email.required" => "Por favor informe o email para o usuário",
            "email.unique" => "Email já cadastrado! Por favor insira um outro email.",
            "email.email" => "Por favor informe o email válido",
            "password.required" => "Por favor informe uma senha para o usuário",
            "password.confirmed" => "Por as senhas digitadas não coincidem. Por favor digite novamente.",
        ];
    }
}
