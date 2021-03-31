<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResiduoRequest;
use App\Http\Requests\ResiduoUpdateRequest;
use Illuminate\Http\Request;
USE Illuminate\Support\Facades\Auth;
use App\Models\Residuo;

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

    public function relatorioresiduo()
    {
        $residuos = Residuo::all();

        $fileName = ('Residuos_lista.pdf');

        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 15,
            'margin_bottom' => 20,
            'margin-header' => 10,
            'margin_footer' => 10
        ]);

        //$html = \View::make('admin.residuo.pdf.pdfresiduogeral')->with('residuos', $residuos);
        $html = \View::make('admin.residuo.pdf.pdfresiduogeral', compact('residuos'));
        $html = $html->render();

        $mpdf->SetHeader('Resíduos| Lista de Resíduos| {PAGENO}');
        $mpdf->setFooter('São Luis(MA) '.date('d/m/Y'));

        //$stylesheet = asset('/pdf/mpdf.css');
        //$mpdf->WriteHTML($stylesheet, 1);

        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName, 'I');

        //return view('admin.residuo.pdf.pdfresiduogeral', compact('residuos'));
    }
}
