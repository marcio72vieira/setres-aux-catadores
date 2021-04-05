<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResiduoRequest;
use App\Http\Requests\ResiduoUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Residuo;
use App\Exports\ResiduoExport;
use Excel;

use Illuminate\Support\Facades\Validator;   //Validação unique
use Illuminate\Validation\Rule;             //Validação unique

class ResiduoController extends Controller
{

    public function index()
    {
        $residuos = Residuo::all();

        return view('admin.residuo.index', compact('residuos'));
    }


    public function create()
    {
        return view('admin.residuo.create');
    }


    public function store(ResiduoRequest $request)
    {
        Residuo::create($request->all());

        $request->session()->flash('sucesso', 'Registro incluído com sucesso!');

        return redirect()->route('admin.residuo.index');
    }


    public function show($id)
    {
        $residuo = Residuo::find($id);

        return view('admin.residuo.show', compact('residuo'));
    }


    public function edit($id)
    {
        $residuo = Residuo::find($id);

        return view('admin.residuo.edit', compact('residuo'));
    }


    public function update($id, ResiduoUpdateRequest $request)
    {
        $residuo = Residuo::find($id);

        // Validação unique
        Validator::make($request->all(), [
            'nome' => [
                'required',
                Rule::unique('residuos')->ignore($residuo->id),
            ],
        ]);


        $residuo->update($request->all());

        $request->session()->flash('sucesso', 'Registro atualizado com sucesso!');

        return redirect()->route('admin.residuo.index');
    }


    public function destroy($id, Request $request)
    {
        Residuo::destroy($id);

        $request->session()->flash('sucesso', 'Registro excluído com sucesso!');

        return redirect()->route('admin.residuo.index');
    }

    // Configuração de Relatórios PDFs
    public function relatorioresiduo()
    {
        $residuos = Residuo::all();

        $fileName = ('Residuos_lista.pdf');

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
                        LISTA DE RESÍDUOS SÓLIDOS
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


        $html = \View::make('admin.residuo.pdf.pdfresiduogeral', compact('residuos'));
        $html = $html->render();

        $stylesheet = file_get_contents('pdf/mpdf.css');
        $mpdf->WriteHTML($stylesheet, 1);

        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName, 'I');

        //return view('admin.residuo.pdf.pdfresiduogeral', compact('residuos'));
    }

    // Relatório Excel
    public function relatorioresiduoexcel()
    {
        return Excel::download(new ResiduoExport,'residuos.xlsx');

    }


    // Relatório CSV
    public function relatorioresiduocsv()
    {
        return Excel::download(new ResiduoExport,'residuos.csv');

    }
}
