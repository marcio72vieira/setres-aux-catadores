<?php

namespace App\Exports;

use App\Models\Companhia;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CompanhiaExport implements FromCollection,WithHeadings
{

    public function headings():array{
        return[
            'id',
            'nome',
            'cnpj',
            'fundacao',
            'foneum',
            'fonedois',
            'presidente',
            'fonepresidente',
            'vicepresidente',
            'fonevicepresidente',
            'endereco',
            'numero',
            'bairro',
            'complemento',
            'cidade',
            'zona'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return AppModelsCompanhia::all();
        return collect(Companhia::getCompanhias());
    }
}
