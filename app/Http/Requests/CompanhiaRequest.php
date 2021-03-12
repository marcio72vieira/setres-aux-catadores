<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanhiaRequest extends FormRequest
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
            'nome' => 'bail|required|min:3',
            'cnpj' => 'bail|required|min:10',
            'fundacao' => 'bail|required',
            'foneum' => 'bail|required_without_all:celular,recado|regex:/^\([1-9]{2}\) [2-9][0-9]{3,4}\-[0-9]{4}$/',
            //'fonedois' => 'bail|required_without_all:celular,recado|regex:/^\([1-9]{2}\) [2-9][0-9]{3,4}\-[0-9]{4}$/',
            'presidente' => 'bail|required|min:3',
            'fonepresidente' => 'bail|required|regex:/^\([1-9]{2}\) [2-9][0-9]{3,4}\-[0-9]{4}$/',
            'vicepresidente' => 'bail|required|min:3',
            'fonevicepresidente' => 'bail|required|regex:/^\([1-9]{2}\) [2-9][0-9]{3,4}\-[0-9]{4}$/',
            'endereco' => 'bail|required|min:3',
            //'numero' => 'bail|required',
            'bairro' => 'bail|required|min:3',
            //'complemento' => 'required',
            'cidade' => 'bail|required',
            'zona' => 'bail|required',
        ];
    }
}
