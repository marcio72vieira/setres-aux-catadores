<?php

namespace App\Exports;

use App\Models\Associado;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AssociadoExportDois implements WithHeadings,FromView
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

    // Exportar a partir de uma view
    public function view(): View
    {
        return view('admin.associado.listaassociados', ['associados' => Associado::all()]);
    }


}
