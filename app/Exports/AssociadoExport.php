<?php

namespace App\Exports;

use App\Models\Associado;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AssociadoExport implements FromCollection,WithHeadings
{

    public function headings():array{
        return[
            'id',
            'nome',
            'nascimento',
            'rg',
            'rgorgaoemissor',
            'cpf',
            'sexo',
            'racacor',
            'filiacao',
            'quantidade',
            'endereco',
            'numero',
            'bairro',
            'complemento',
            'cidade',
            'zona',
            'foneum',
            'fonedois',
            'companhia_id',
            'imagem'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return AppModelsCompanhia::all();
        return collect(Associado::getAssociados());
    }
}
