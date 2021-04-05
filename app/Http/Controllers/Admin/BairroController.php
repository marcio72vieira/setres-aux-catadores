<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BairroRequest;
use App\Http\Requests\BairroUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Bairro;
use App\Exports\BairroExport;
use Excel;

use Illuminate\Support\Facades\Validator;   //Validação unique
use Illuminate\Validation\Rule;             //Validação unique

class BairroController extends Controller
{

    public function index()
    {
        $bairros = Bairro::all();

        return view('admin.bairro.index', compact('bairros'));
    }


    public function create()
    {
        return view('admin.bairro.create');
    }


    public function store(BairroRequest $request)
    {
        Bairro::create($request->all());

        $request->session()->flash('sucesso', 'Registro incluído com sucesso!');

        return redirect()->route('admin.bairro.index');
    }


    public function show($id)
    {
        $bairro = Bairro::find($id);

        return view('admin.bairro.show', compact('bairro'));


    }


    public function edit($id)
    {
        $bairro = Bairro::find($id);

        return view('admin.bairro.edit', compact('bairro'));
    }


    public function update($id, BairroUpdateRequest $request)
    {
        $bairro = Bairro::find($id);

        // Validação unique
        Validator::make($request->all(), [
            'nome' => [
                'required',
                Rule::unique('bairros')->ignore($bairro->id),
            ],
        ]);


        $bairro->update($request->all());

        $request->session()->flash('sucesso', 'Registro atualizado com sucesso!');

        return redirect()->route('admin.bairro.index');
    }


    public function destroy($id, Request $request)
    {
        Bairro::destroy($id);

        $request->session()->flash('sucesso', 'Registro excluído com sucesso!');

        return redirect()->route('admin.bairro.index');
    }

    // Configuração de Relatórios PDFs
    public function relatoriobairro()
    {
        $bairros = Bairro::all();

        $fileName = ('Bairos_lista.pdf');

        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 32,
            'margin_bottom' => 15,
            'margin-header' => 10,
            'margin_footer' => 5
        ]);

        $mpdf->SetHTMLHeader('
            <table class="line-primary">
                <tr>
                    <td class="section-left">
                        <img src="images/logo-ma.png" width="80"/>
                    </td>
                    <td class="section-center">
                        Governo do Estado do Maranhão<br>
                        Secretaria de Governo<br>
                        Secreatia Adjunta de Tecnologia da Informação/SEATI<br>
                        Secretaria do Trabalho e Economia Solidaria/SETRES
                    </td>
                    <td class="section-right">
                        LISTA DE BAIRROS
                    </td>
                </tr>
            </table>
            <table class="line-seconday">
                <tr>
                    <td class="col-header-table" style="width: 10%">ID</td>
                    <td class="col-header-table" style="width: 90%">NOME</td>
                </tr>
            </table>
        ');

        $mpdf->SetHTMLFooter('
            <table class="tabela-footer">
                <tr>
                    <td width="33%">São Luis(MA) {DATE d/m/Y}</td>
                    <td width="33%" align="center"></td>
                    <td width="33%" style="text-align: right;">{PAGENO}/{nbpg}</td>
                </tr>
            </table>
        ');


        $html = \View::make('admin.bairro.pdf.pdfbairrogeral', compact('bairros'));
        $html = $html->render();

        $stylesheet = file_get_contents('pdf/mpdf.css');
        $mpdf->WriteHTML($stylesheet, 1);

        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName, 'I');

        //return view('admin.residuo.pdf.pdfresiduogeral', compact('residuos'));
    }

    // Relatório Excel
    public function relatoriobairroexcel()
    {
        return Excel::download(new BairroExport,'bairros.xlsx');

    }


    // Relatório CSV
    public function relatoriobairrocsv()
    {
        return Excel::download(new BairroExport,'bairros.csv');

    }
}
