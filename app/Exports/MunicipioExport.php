<?php

namespace App\Exports;

use App\Models\Municipio;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MunicipioExport implements FromCollection,WithHeadings
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
        //return AppModelsMunicipio::all();
        return collect(Municipio::getMunicipios());
    }
}
