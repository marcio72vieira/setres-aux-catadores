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
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Validator;   //Validação unique
use Illuminate\Validation\Rule;             //Validação unique

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

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
        /* DEU CERTO
        1 - Em um terminal, digitar: composer require chillerlan/php-qrcode
        2 - Em um controller, importar:
            use chillerlan\QRCode\QRCode;
            use chillerlan\QRCode\QROptions;
        3 - Definir a informação a ser armazenada
            $dados = 'Marcio Nonato F. Vieira';
        4 - Definir a variável que irá conter o qrcode a partir da informação $dados
            $qrcode = (new QRCode)->render($dados).'" />';
        5 - Enviar para a view, através do 'compact' a variável que possui o qrcode gerado
            return view('admin.residuo.show', compact('residuo', 'qrcode'));
        6 - Na view, em uma tag de imagem <img> exibir o QRCODE a partir da variável $qrcode
            {{-- <img src="{{$qrcode}}" /> --}}
        */

        $residuo = Residuo::find($id);

        $data = $residuo->nome;
        $qrcode = (new QRCode)->render($data);

        return view('admin.residuo.show', compact('residuo', 'qrcode'));

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
        if(Gate::authorize('adm')){
            Residuo::destroy($id);

            $request->session()->flash('sucesso', 'Registro excluído com sucesso!');

            return redirect()->route('admin.residuo.index');
        }
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
                            RESÍDUOS SÓLIDOS
                        </td>
                    </tr>
                </table>
                <table style="width:717px; border-collapse: collapse;">
                    <tr>
                        <td width="50px" class="col-header-table">ID</td>
                        <td width="667px" class="col-header-table">NOME</td>
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
        if(Gate::authorize('adm')){
            return Excel::download(new ResiduoExport,'residuos.xlsx');
        }

    }


    // Relatório CSV
    public function relatorioresiduocsv()
    {
        if(Gate::authorize('adm')){
            return Excel::download(new ResiduoExport,'residuos.csv');
        }
    }
}
