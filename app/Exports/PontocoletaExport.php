<?php

namespace App\Exports;

use App\Models\Pontocoleta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PontocoletaExport implements FromCollection,WithHeadings
{

    public function headings():array{
        return[
            'id',
            'nome',
            'endereco',
            'numero',
            'bairro',
            'complemento',
            'cidade',
            'zona',
            'companhia',
            'residuo'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return AppModelsPontocoleta::all();
        return collect(Pontocoleta::getPontoscoleta());
    }
}
