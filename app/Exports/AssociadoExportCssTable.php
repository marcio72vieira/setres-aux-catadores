<?php

namespace App\Exports;

use App\Models\Associado;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AssociadoExportCssTable implements WithHeadings,FromView
{

    public function headings():array{
        return[
            'id',
            'nome',
            'cpf',
            '@'
        ];
    }

    // Exportar a partir de uma view
    public function view(): View
    {
        return view('admin.associado.listaassociadoscsstable', ['associados' => Associado::all()]);
    }


}
