<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PontocoletaRequest extends FormRequest
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
            'municipio_id' => 'bail|required',
            'endereco' => 'bail|required|min:3',
            //'numero' => 'bail|required',
            'bairro_id' => 'bail|required',
            //'complemento' => 'required',
            'municipio_id' => 'bail|required',
            'zona' => 'bail|required',
        ];
    }
}
