<?php

namespace App\Exports;

use App\Models\Associado;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class AssociadoExport implements FromCollection,WithHeadings
//class AssociadoExport implements FromView
{

    /*
    // Cabeçalho para arquivos xlsx e csv a partir dos ASSOCIADOS sem relacionamento
    public function headings():array{
        return[
            'id', 'nome', 'nascimento', 'rg', 'rgorgaoemissor', 'cpf', 'sexo', 'racacor', 'filiacao', 'quantidade',
            'endereco', 'numero', 'bairro', 'complemento', 'cidade', 'zona', 'foneum', 'fonedois', 'imagem', 'companhia_id',
             //foto // Se eu quiser mostrar a coluna foto no excel;
        ];
    }
    */

    /*
    // Cabeçalho para arquivos xlsx e csv a partir dos dados dos ASSOCIADOS e COMPANHIAS
    public function headings():array{
        return[
            'id', 'nome', 'nascimento', 'rg', 'rgorgaoemissor', 'cpf', 'sexo', 'racacor', 'filiacao', 'quantidade',
            'endereco', 'numero', 'bairro', 'complemento', 'cidade', 'zona', 'foneum', 'fonedois', 'imagem', 'companhia_id',
            'nomecompanhia'
        ];
    }
    */

    //Cabeçalho para arquivos xlsx e csv a partir da dos dados dos ASSOCIADOS e COMPANHIAS e BAIRROS
    public function headings():array{
        return[
            'id', 'nome', 'nascimento', 'rg', 'rgorgaoemissor', 'cpf', 'sexo', 'racacor', 'filiacao', 'quantidade',
            'endereco', 'numero', 'bairro', 'complemento', 'municipio', 'zona', 'foneum', 'fonedois', 'companhia', 'area', 'imagem',
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


    /*
    // Exportar a partir de uma view
    public function view(): View
    {
        return view('admin.associado.listaassociados', ['associados' => Associado::all()]);
    }
    */
}
