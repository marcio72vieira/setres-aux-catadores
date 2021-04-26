<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AssociadoRequest;
use App\Http\Requests\AssociadoUpdateRequest;
use App\Models\Companhia;
use App\Models\Area;
use App\Models\Bairro;
use App\Models\Municipio;
use App\Models\Associado;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Exports\AssociadoExport;
use App\Exports\AssociadoExportDois;
use Excel;

use Illuminate\Support\Facades\Validator;   //Validação unique para cnpj na atualização
use Illuminate\Validation\Rule;             //Validação unique para cnpm na atualização


class AssociadoController extends Controller
{

    public function index()
    {
        $associados = Associado::all();

        return view('admin.associado.index', compact('associados'));

    }


    public function create()
    {
        // Visualiza todos as companhias, áreas, bairros e municípios
        if(Auth::user()->id == 1){
            $companhias = Companhia::all();
            $areas = Area::all();
            $bairros = Bairro::all();
            $municipios = Municipio::all();
        } else {
            // Só visualiza as companhias, áreas, bairros e municípios do seu município
            $companhias = Companhia::where('municipio_id', '=', Auth::user()->id)->orderBy('nome', 'ASC')->get();
            $areas = Area::where('municipio_id', '=', Auth::user()->id)->orderBy('nome', 'ASC')->get();
            $bairros = Bairro::where('municipio_id', '=', Auth::user()->id)->orderBy('nome', 'ASC')->get();
            //$municipios = Municipio::where('municipio_id', '=', Auth::user()->id)->orderBy('nome', 'ASC')->get();
            $municipios = Municipio::where('id', '=', Auth::user()->municipio_id)->get();
        }

        return view('admin.associado.create', compact('companhias','areas','bairros','municipios'));

    }


    /* 1° MÉTODO OROGINAL SEM CAPTURAR FOTO
    public function store(AssociadoRequest $request)
    {
        //dd($request->all());

        DB::beginTransaction();
            $associado = Associado::create($request->all());

            if($request->has('bairros')){
                $associado->bairros()->sync($request->bairros);
            }
        DB::commit();

        $request->session()->flash('sucesso', 'Registro incluído com sucesso!');
        return redirect()->route('admin.associado.index');
    }
    */

    /* 2° MÉTODO OROGINAL CAPTURANDO FOTO
    public function store(AssociadoRequest $request)
    {
        //dd($request->all());

        DB::beginTransaction();
            $associado = Associado::create($request->all());

            if($request->has('bairros')){
                $associado->bairros()->sync($request->bairros);
            }
        DB::commit();

        // Obtendo o id do associado que acabou de ser inserido no banco de dados
        $associadoId = $associado->id;

        $request->session()->flash('sucesso', 'Registro incluído com sucesso!');
        return redirect()->route('admin.associado.retrato', $associadoId);
    }
    */


    public function store(AssociadoRequest $request)
    {
        DB::beginTransaction();
            $associado = Associado::create($request->all());

            if($request->has('areas')){
                $associado->areas()->sync($request->areas);
            }
        DB::commit();

        // Obtendo o id do associado que acabou de ser inserido no banco de dados
        $associadoId = $associado->id;

        $request->session()->flash('sucesso', 'Registro incluído com sucesso!');
        return redirect()->route('admin.associado.retrato', $associadoId);
    }



    public function show($id)
    {
        //$associado = Associado::with(['companhia', 'bairros'])->find($id);
        $associado = Associado::with(['companhia', 'areas', 'bairro', 'municipio'])->find($id);

        $companhias = Companhia::all();
        $areas = Area::all();
        $bairros = Bairro::all();
        $municipios = Municipio::all();


        return view('admin.associado.show', compact('associado', 'companhias','areas','bairros','municipios'));
    }


    public function edit($id)
    {
        //$associado = Associado::with(['companhia', 'bairros'])->find($id);
        $associado = Associado::with(['companhia', 'areas', 'bairro', 'municipio'])->find($id);

        // Visualiza todos as companhias, áreas, bairros e municípios
        if(Auth::user()->id == 1){
            $companhias = Companhia::all();
            $areas = Area::all();
            $bairros = Bairro::all();
            $municipios = Municipio::all();
        } else {
            // Só visualiza as companhias, áreas, bairros e municípios do seu município
            $companhias = Companhia::where('municipio_id', '=', Auth::user()->id)->orderBy('nome', 'ASC')->get();
            $areas = Area::where('municipio_id', '=', Auth::user()->id)->orderBy('nome', 'ASC')->get();
            $bairros = Bairro::where('municipio_id', '=', Auth::user()->id)->orderBy('nome', 'ASC')->get();
            $municipios = Municipio::where('municipio_id', '=', Auth::user()->id)->orderBy('nome', 'ASC')->get();
        }


        return view('admin.associado.edit', compact('associado', 'companhias','areas','bairros','municipios'));
    }


    public function update($id, AssociadoUpdateRequest $request)
    {

        //dd($request->all());
        $associado = Associado::find($id);

         // Validação unique para cpf na atualização
         Validator::make($request->all(), [
            'cpf' => [
                'required',
                Rule::unique('associados')->ignore($associado->id),
            ],
        ]);

        DB::beginTransaction();
            $associado->update($request->all());

            if($request->has('areas')){
                $associado->areas()->sync($request->areas);
            }
        DB::commit();

        $request->session()->flash('sucesso', 'Registro alteado com sucesso!');
        return redirect()->route('admin.associado.index');

    }


    public function destroy($id, Request $request)
    {
        Associado::destroy($id);

        $request->session()->flash('sucesso', 'Registro excluido com sucesso!');

        return redirect()->route('admin.associado.index');


    }

    public function retrato($id)
    {
        $associado   = Associado::find($id);
        $titulo         = "RETRATO do(a) Sr(a): ";

        return view('admin.associado.retrato', compact('associado', 'titulo'));
    }


    public function salvaretrato(Request $request)
    {
        $img                = $request['base64image'];
        $idassociado        = $request['id'];
        $nomeassociado      = $request['nome'];
        $cpfassociado       = $request['cpf'];
        $companhiaassociado = $request['companhia'];

        // Deletando qualquer foto existente no banco que seja do profissional corrente
        DB::table('fotos')->where('associado_id', '=', $idassociado)->delete();

        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);

        $file = "public/fotos/coletor". $idassociado . '.png';
        $path = "fotos/coletor". $idassociado . '.png';
        $success = Storage::put($file, $data);


        //Inserindo os dados na tabela fotos. Esta tabela pode ser suprimida, uma vez que o campo imagem na tabela
        // associados será atualizado com o caminho da foto salva na pasta storage/public/fotos
        if($success){
            DB::table('fotos')->insert([
                'associado_id' => $idassociado,
                'nome' => $nomeassociado,
                'cpf' => $cpfassociado,
                'companhia' => $companhiaassociado,
                'foto' => $path,
                'created_at' => today(),
                'updated_at' => today() ]);

                // Atualizando apenas o campo image na tabela associados (este campo fica fica vazio na criação do associado)
                Associado::where('id', $idassociado)->update(array('imagem' => $path));

            return  "Foto salva com sucesso!";

        } else {

            return  "Não foi possível salvar a imagem capturada.";
        }
    }


    // Configuração de Relatórios PDFs
    public function relatorioassociado()
    {
        $associados = Associado::orderBy('nome', 'ASC')->get();

        $fileName = ('Associados_lista.pdf');

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
                        ASSOCIADOS
                    </td>
                </tr>
            </table>
            <table style="width:1080px; border-collapse: collapse;">
                <tr>
                    <td width="50px" class="col-header-table">ID</td>
                    <td width="250px" class="col-header-table">NOME</td>
                    <td width="110px" class="col-header-table">RG</td>
                    <td width="90px" class="col-header-table">CPF</td>
                    <td width="180px" class="col-header-table">TELEFFONES</td>
                    <td width="200px" class="col-header-table">COMPANHIA</td>
                    <td width="200px" class="col-header-table">ÁREA DE ATUAÇÃO</td>
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


        $html = \View::make('admin.associado.pdf.pdfassociadogeral', compact('associados'));
        $html = $html->render();

        $stylesheet = file_get_contents('pdf/mpdf.css');
        $mpdf->WriteHTML($stylesheet, 1);

        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName, 'I');

    }


    // Relatório Excel
    public function relatorioassociadoexcel()
    {
        return Excel::download(new AssociadoExport,'associados.xlsx');

    }

    // Relatório CSV
    public function relatorioassociadocsv()
    {
        return Excel::download(new AssociadoExport,'associados.csv');

    }

    // Relatório HTML to Excel
    public function relatorioassociadoexceldois()
    {
        return Excel::download(new AssociadoExportDois,'associadosdois.xlsx');

    }


    public function ficha($id)
    {
        $associado = Associado::find($id);

        $fileName = ('Associado_ficha.pdf');

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
                        FICHA: '.$associado->nome.'
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


        $html = \View::make('admin.associado.pdf.pdfassociadoficha', compact('associado'));
        $html = $html->render();

        $stylesheet = file_get_contents('pdf/mpdf.css');
        $mpdf->WriteHTML($stylesheet, 1);

        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName, 'I');
    }




}
