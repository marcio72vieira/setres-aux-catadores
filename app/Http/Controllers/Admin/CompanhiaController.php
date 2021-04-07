<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanhiaRequest;
use App\Http\Requests\CompanhiaUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Companhia;
use App\Models\Residuo;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;   //Validação unique para cnpj na atualização
use Illuminate\Validation\Rule;             //Validação unique para cnpm na atualização

class CompanhiaController extends Controller
{

    public function index()
    {
        $companhias = Companhia::all();

        return view('admin.companhia.index', compact('companhias'));
    }


    public function create()
    {
        $residuos = Residuo::all();

        return view('admin.companhia.create', compact('residuos'));
    }


    public function store(CompanhiaRequest $request)
    {
        //dd($request->all());

        DB::beginTransaction();
            $companhia = Companhia::create($request->all());

            if($request->has('residuos')){
                $companhia->residuos()->sync($request->residuos);
            }
        DB::commit();

        $request->session()->flash('sucesso', 'Registro incluído com sucesso!');
        return redirect()->route('admin.companhia.index');
    }


    public function show($id)
    {
        $companhia = Companhia::find($id);
        $residuos = Residuo::all();

        return view('admin.companhia.show', compact('companhia', 'residuos'));
    }


    public function edit($id)
    {
        $companhia = Companhia::find($id);
        $residuos = Residuo::all();

        return view('admin.companhia.edit', compact('companhia', 'residuos'));
    }


    public function update($id, CompanhiaUpdateRequest $request)
    {
        $companhia = Companhia::find($id);

        // Validação unique para cnpj na atualização
        Validator::make($request->all(), [
            'cnpj' => [
                'required',
                Rule::unique('companhias')->ignore($companhia->id),
            ],
        ]);

        DB::beginTransaction();
            $companhia->update($request->all());

            if($request->has('residuos')){
                $companhia->residuos()->sync($request->residuos);
            }
        DB::commit();

        $request->session()->flash('sucesso', 'Registro atualizado com sucesso!');

        return redirect()->route('admin.companhia.index');
    }


    public function destroy($id, Request $request)
    {
        Companhia::destroy($id);

        $request->session()->flash('sucesso', 'Registro excluído com sucesso!');

        return redirect()->route('admin.companhia.index');
    }


    // Configuração de Relatórios PDFs
    public function relatoriocompanhia()
    {
        $companhias = Companhia::all();

        $fileName = ('Companhias_lista.pdf');

        $mpdf = new \Mpdf\Mpdf([
            'orientation' => 'L',
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 32,
            'margin_bottom' => 15,
            'margin-header' => 10,
            'margin_footer' => 5
        ]);

        $mpdf->SetHTMLHeader('
            <table style="width:1080px; border-bottom: 1px solid #000000; margin-bottom: 3px;">
                <tr>
                    <td style="width: 108px">
                        <img src="images/logo-ma.png" width="80"/>
                    </td>
                    <td style="width: 432px; font-size: 10px; font-family: Arial, Helvetica, sans-serif;">
                        Governo do Estado do Maranhão<br>
                        Secretaria de Governo<br>
                        Secreatia Adjunta de Tecnologia da Informação/SEATI<br>
                        Secretaria do Trabalho e Economia Solidaria/SETRES
                    </td>
                    <td style="width: 540px;" class="titulo-rel">
                        COMPANHIAS
                    </td>
                </tr>
            </table>
            <table style="width:1080px; border-collapse: collapse;">
                <tr>
                    <td width="50px" class="col-header-table">ID</td>
                    <td width="250px" class="col-header-table">NOME</td>
                    <td width="110px" class="col-header-table">CNPJ</td>
                    <td width="90px" class="col-header-table">TELEFFONE</td>
                    <td width="200px" class="col-header-table">PRESIDENTE</td>
                    <td width="90px" class="col-header-table">TELEFONE</td>
                    <td width="200px" class="col-header-table">VICE-PRESIDETE</td>
                    <td width="90px" class="col-header-table">TELEFONE</td>
                </tr>
            </table>
        ');

        $mpdf->SetHTMLFooter('
            <table style="width:1080px; border-top: 1px solid #000000; font-size: 10px; font-family: Arial, Helvetica, sans-serif;">
                <tr>
                    <td width="360px">São Luis(MA) {DATE d/m/Y}</td>
                    <td width="360px" align="center"></td>
                    <td width="360px" align="right">{PAGENO}/{nbpg}</td>
                </tr>
            </table>
        ');


        $html = \View::make('admin.companhia.pdf.pdfcompanhiageral', compact('companhias'));
        $html = $html->render();

        $stylesheet = file_get_contents('pdf/mpdf.css');
        $mpdf->WriteHTML($stylesheet, 1);

        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName, 'I');

        //return view('admin.residuo.pdf.pdfresiduogeral', compact('residuos'));
    }


    public function ficha($id)
    {
        $companhia = Companhia::find($id);

        $fileName = ('Companhia_ficha.pdf');

        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 25,
            'margin_bottom' => 15,
            'margin-header' => 10,
            'margin_footer' => 5
        ]);

        $mpdf->SetHTMLHeader('
            <table style="width:717px; border-bottom: 1px solid #000000; margin-bottom: 3px;">
                <tr>
                    <td style="width: 83px">
                        <img src="images/logo-ma.png" width="80"/>
                    </td>
                    <td style="width: 282px; font-size: 10px; font-family: Arial, Helvetica, sans-serif;">
                        Governo do Estado do Maranhão<br>
                        Secretaria de Governo<br>
                        Secreatia Adjunta de Tecnologia da Informação/SEATI<br>
                        Secretaria do Trabalho e Economia Solidaria/SETRES
                    </td>
                    <td style="width: 352px;" class="titulo-rel">
                        '.$companhia->nome.'
                    </td>
                </tr>
            </table>
        ');

        $mpdf->SetHTMLFooter('
            <table style="width:717px; border-top: 1px solid #000000; font-size: 10px; font-family: Arial, Helvetica, sans-serif;">
                <tr>
                    <td width="239px">São Luis(MA) {DATE d/m/Y}</td>
                    <td width="239px" align="center"></td>
                    <td width="239px" align="right">{PAGENO}/{nbpg}</td>
                </tr>
            </table>
        ');


        $html = \View::make('admin.companhia.pdf.pdfcompanhiaficha', compact('companhia'));
        $html = $html->render();

        $stylesheet = file_get_contents('pdf/mpdf.css');
        $mpdf->WriteHTML($stylesheet, 1);

        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName, 'I');
    }
}
