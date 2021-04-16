<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MunicipioRequest;
use App\Http\Requests\MunicipioUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Municipio;
use App\Exports\MunicipioExport;
use Excel;

use Illuminate\Support\Facades\Validator;   //Validação unique
use Illuminate\Validation\Rule;             //Validação unique

class MunicipioController extends Controller
{

    public function index()
    {
        $municipios = Municipio::all();

        return view('admin.municipio.index', compact('municipios'));
    }


    public function create()
    {
        return view('admin.municipio.create');
    }


    public function store(MunicipioRequest $request)
    {
        Municipio::create($request->all());

        $request->session()->flash('sucesso', 'Registro incluído com sucesso!');

        return redirect()->route('admin.municipio.index');
    }


    public function show($id)
    {
        $municipio = Municipio::find($id);

        return view('admin.municipio.show', compact('municipio'));
    }


    public function edit($id)
    {
        $municipio = Municipio::find($id);

        return view('admin.municipio.edit', compact('municipio'));
    }


    public function update($id, MunicipioUpdateRequest $request)
    {
        $municipio = Municipio::find($id);

        // Validação unique
        Validator::make($request->all(), [
            'nome' => [
                'required',
                Rule::unique('municipios')->ignore($municipio->id),
            ],
        ]);


        $municipio->update($request->all());

        $request->session()->flash('sucesso', 'Registro atualizado com sucesso!');

        return redirect()->route('admin.municipio.index');
    }


    public function destroy($id, Request $request)
    {
        Municipio::destroy($id);

        $request->session()->flash('sucesso', 'Registro excluído com sucesso!');

        return redirect()->route('admin.municipio.index');
    }


    // Configuração de Relatórios PDFs
    public function relatoriomunicipio()
    {
        $municipios = Municipio::all();

        $fileName = ('Municipios_lista.pdf');

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
                        MUNICÍPIOS
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


        $html = \View::make('admin.municipio.pdf.pdfmunicipiogeral', compact('municipios'));
        $html = $html->render();

        $stylesheet = file_get_contents('pdf/mpdf.css');
        $mpdf->WriteHTML($stylesheet, 1);

        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName, 'I');

        //return view('admin.residuo.pdf.pdfresiduogeral', compact('residuos'));
    }

    // Relatório Excel
    public function relatoriomunicipioexcel()
    {
        return Excel::download(new MunicipioExport,'municipios.xlsx');

    }


    // Relatório CSV
    public function relatoriomunicipiocsv()
    {
        return Excel::download(new MunicipioExport,'municipios.csv');

    }
}
