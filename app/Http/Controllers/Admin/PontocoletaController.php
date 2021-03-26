<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PontocoletaRequest;
use App\Http\Requests\PontocoletaUpdateRequest;
use App\Models\Pontocoleta;
use App\Models\Residuo;
use Illuminate\Support\Facades\DB;


class PontocoletaController extends Controller
{

    public function index()
    {
        $pontocoletas = Pontocoleta::all();

        return view('admin.pontocoleta.index', compact('pontocoletas'));
    }


    public function create()
    {
        $residuos = Residuo::all();

        return view('admin.pontocoleta.create', compact('residuos'));
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
        $residuos = Residuo::all();

        return view('admin.pontocoleta.show', compact('pontocoleta','residuos'));
    }


    public function edit($id)
    {
        $pontocoleta = Pontocoleta::find($id);
        $residuos = Residuo::all();

        return view('admin.pontocoleta.edit',compact('pontocoleta', 'residuos'));
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
        Pontocoleta::destroy($id);

        $request->session()->flash('sucessco','Registro excluído com sucesso');
        return redirect()->route('admin.pontocoleta.index');

    }
}
