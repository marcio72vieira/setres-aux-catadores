<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'fullname'              => 'bail|required|string',
            'cpf'                   => 'required|unique:users,cpf',
            'telefone'              => 'required',
            'name'                  => 'bail|required|string',  // é o campo usuário
            'email'                 => 'bail|required|string|email|unique:users',
            'perfil'                => 'bail|required',
            'municipio_id'          => 'bail|required',
            'password'              => 'bail|required|confirmed',
            'password_confirmation' => 'bail|required',
        ];
    }
}
