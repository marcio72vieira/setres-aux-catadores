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
                        LISTA DE COMPANHIAS
                    </td>
                </tr>
            </table>
            <table class="line-seconday-landscape">
                <tr>
                    <td class="col-header-table" style="width: 50px;">ID</td>
                    <td class="col-header-table" style="width: 250px;">NOME</td>
                    <td class="col-header-table" style="width: 110px;">CNPJ</td>
                    <td class="col-header-table" style="width: 90px;">TELEFFONE</td>
                    <td class="col-header-table" style="width: 200px;">PRESIDENTE</td>
                    <td class="col-header-table" style="width: 90px;">TELEFONE</td>
                    <td class="col-header-table" style="width: 200px;">VICE-PRESIDETE</td>
                    <td class="col-header-table" style="width: 90px;">TELEFONE</td>
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


        $html = \View::make('admin.companhia.pdf.pdfcompanhiageral', compact('companhias'));
        $html = $html->render();

        $stylesheet = file_get_contents('pdf/mpdf.css');
        $mpdf->WriteHTML($stylesheet, 1);

        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName, 'I');

        //return view('admin.residuo.pdf.pdfresiduogeral', compact('residuos'));
    }
}
