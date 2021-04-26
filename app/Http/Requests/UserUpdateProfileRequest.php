<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateProfileRequest extends FormRequest
{

    /*
    public $validator = null;
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $this->validator = $validator;
    }
    */

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
            'cpf'                   => 'required',
            'telefone'              => 'required',
            'name'                  => 'bail|required|string',  // é o campo usuário
            'email'                 => 'bail|required|string|email',
            'perfil'                => 'bail|required',
            'municipio_id'          => 'bail|required',
            'password'              => 'bail|required_with:password_confirmation|confirmed',
            'password_confirmation' => 'bail|required_with:password',
        ];
    }
}
