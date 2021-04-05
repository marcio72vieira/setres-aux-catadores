<?php

namespace App\Exports;


use App\Models\Bairro;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BairroExport implements FromCollection,WithHeadings
{
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
        //return AppModelsBairro::all();
        return collect(Bairro::getBairros());
    }
}
