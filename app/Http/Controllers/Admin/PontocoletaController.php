<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PontocoletaRequest;
use App\Http\Requests\PontocoletaUpdateRequest;
use App\Models\Pontocoleta;
use App\Models\Companhia;
use App\Models\Bairro;
use App\Models\Municipio;
use App\Models\Residuo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use App\Exports\PontocoletaExport;
use Excel;


class PontocoletaController extends Controller
{

    public function index()
    {
        // Se ADMINISTRADOR, visualiza todos os ASSOCIADOS, caso contrário, OPERADOR, só os do seu município
        if(Auth::user()->perfil == 'adm'){
            $pontocoletas = Pontocoleta::orderBy('nome', 'ASC')->get();
        } else {
            $pontocoletas = Pontocoleta::where('municipio_id', '=', Auth::user()->municipio_id)->orderBy('nome', 'ASC')->get();
        }

        return view('admin.pontocoleta.index', compact('pontocoletas'));
    }


    public function create()
    {

        // Se ADMINISTRADOR, visualiza todos os registros, caso contrário, OPERADOR, só os do seu município
        if(Auth::user()->perfil == 'adm'){
            $companhias = Companhia::orderBy('nome', 'ASC')->get();
            $bairros = Bairro::orderBy('nome', 'ASC')->get();
            $municipios = Municipio::orderBy('nome', 'ASC')->get();
        } else {
            $companhias = Companhia::where('municipio_id', '=', Auth::user()->municipio_id)->orderBy('nome', 'ASC')->get();
            $bairros = Bairro::where('municipio_id', '=', Auth::user()->municipio_id)->orderBy('nome', 'ASC')->get();
            $municipios = Municipio::where('id', '=', Auth::user()->municipio_id)->get();
        }

        // É resgatado todos os resíduos, independente de ser 'adm' ou 'ope'
        $residuos = Residuo::orderBy('nome', 'ASC')->get();

        return view('admin.pontocoleta.create', compact('companhias','bairros','municipios','residuos'));
    }


    public function store(PontocoletaRequest $request)
    {

        //dd($request->all());
        DB::beginTransaction();
            $pontocoleta = Pontocoleta::create($request->all());

            if($request->has('residuos')){
                $pontocoleta->residuos()->sync($request->residuos);
            }
        DB::commit();

        $request->session()->flash('sucesso', 'Registro incluído com sucesso!');

        return redirect()->route('admin.pontocoleta.index');
    }


    public function show($id)
    {
        $pontocoleta = Pontocoleta::find($id);
        $residuos = Residuo::orderBy('nome', 'ASC')->get();

        if(Auth::user()->perfil == 'adm'){
            $companhias = Companhia::orderBy('nome', 'ASC')->get();
            $bairros = Bairro::orderBy('nome', 'ASC')->get();
            $municipios = Municipio::orderBy('nome', 'ASC')->get();
        } else {
            $companhias = Companhia::where('municipio_id', '=', Auth::user()->municipio_id)->orderBy('nome', 'ASC')->get();
            $bairros = Bairro::where('municipio_id', '=', Auth::user()->municipio_id)->orderBy('nome', 'ASC')->get();
            $municipios = Municipio::where('id', '=', Auth::user()->municipio_id)->get();
        }

        return view('admin.pontocoleta.show', compact('pontocoleta','residuos','companhias','bairros','municipios'));
    }


    public function edit($id)
    {
        $pontocoleta = Pontocoleta::find($id);
        $residuos = Residuo::orderBy('nome', 'ASC')->get();

        if(Auth::user()->perfil == 'adm'){
            $companhias = Companhia::orderBy('nome', 'ASC')->get();
            $bairros = Bairro::orderBy('nome', 'ASC')->get();
            $municipios = Municipio::orderBy('nome', 'ASC')->get();
        } else {
            $companhias = Companhia::where('municipio_id', '=', Auth::user()->municipio_id)->orderBy('nome', 'ASC')->get();
            $bairros = Bairro::where('municipio_id', '=', Auth::user()->municipio_id)->orderBy('nome', 'ASC')->get();
            $municipios = Municipio::where('id', '=', Auth::user()->municipio_id)->get();
        }

        return view('admin.pontocoleta.edit',compact('pontocoleta','residuos', 'companhias','bairros','municipios'));
    }


    public function update( $id, PontocoletaUpdateRequest $request)
    {
        $pontocoleta = Pontocoleta::find($id);

        DB::beginTransaction();
            $pontocoleta->update($request->all());

            if($request->has('residuos')){
                $pontocoleta->residuos()->sync($request->residuos);
            }
        DB::commit();

        $request->session()->flash('sucesso', 'Registro editado com sucesso!');

        return redirect()->route('admin.pontocoleta.index');
    }


    public function destroy($id, Request $request)
    {
        if(Gate::authorize('adm')){
            Pontocoleta::destroy($id);

            $request->session()->flash('sucessco','Registro excluído com sucesso');

            return redirect()->route('admin.pontocoleta.index');
        }

    }

    public function relatoriopontocoleta()
    {

        if(Auth::user()->perfil == 'adm'){
            $pontoscoleta = Pontocoleta::orderBy('nome', 'ASC')->get();
        } else {
            $pontoscoleta = Pontocoleta::where('municipio_id', '=', Auth::user()->municipio_id)->orderBy('nome', 'ASC')->get();
        }

        $fileName = ('Pontoscoleta_lista.pdf');

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
                        PONTOS DE COLETA
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


        $html = \View::make('admin.pontocoleta.pdf.pdfpontocoletageral', compact('pontoscoleta'));
        $html = $html->render();

        $stylesheet = file_get_contents('pdf/mpdf.css');
        $mpdf->WriteHTML($stylesheet, 1);

        /*
        Marca D'agua com imagem. Tem que ser posicionado depois do header e footer
        $mpdf->showWatermarkImage = true;
        $mpdf->WriteHTML(
            '<watermarkimage src="images/logo-brasil.png" alpha="0.1" size="100,100" />'
        );
        */

        /*
        Marca D'água com texto. Tem que ser posicionado depois do header e footer
        $mpdf->SetWatermarkText('SEATI', 0.1);
        $mpdf->showWatermarkText = true;
        */

        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName, 'I');
    }

    // Relatório Excel
    public function relatoriopontocoletaexcel()
    {
        if(Gate::authorize('adm')){
            return Excel::download(new PontocoletaExport,'pontoscoleta.xlsx');
        }
    }


    // Relatório CSV
    public function relatoriopontocoletacsv()
    {
        if(Gate::authorize('adm')){
            return Excel::download(new PontocoletaExport,'pontoscoleta.csv');
        }
    }
}
