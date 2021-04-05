<?php

namespace App\Exports;


use App\Models\Residuo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ResiduoExport implements FromCollection,WithHeadings
{

    // Depois de baixar o Maatwebsite
    // composer require maatwebsite/excel
    // php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider"

    // Comando para gerar este export:
    // php artisan make:export ResiduoExport --model=App\Models\Residuo

    public function headings():array{
        return[
            'id',
            'nome'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return AppModelsResiduo::all();
        return collect(Residuo::getResiduos());
    }
}
