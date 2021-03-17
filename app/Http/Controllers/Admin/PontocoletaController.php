<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PontocoletaRequest;
use App\Http\Requests\PontocoletaUpdateRequest;
use App\Models\Pontocoleta;


class PontocoletaController extends Controller
{

    public function index()
    {
        $pontocoletas = Pontocoleta::all();

        return view('admin.pontocoleta.index', compact('pontocoletas'));
    }


    public function create()
    {
        return view('admin.pontocoleta.create');
    }


    public function store(PontocoletaRequest $request)
    {

        $pontocoleta = Pontocoleta::create($request->all());

        $request->session()->flash('sucesso', 'Registro incluído com sucesso!');
        return redirect()->route('admin.pontocoleta.index');
    }


    public function show($id)
    {
        $pontocoleta = Pontocoleta::find($id);

        return view('admin.pontocoleta.show', compact('pontocoleta'));
    }


    public function edit($id)
    {
        $pontocoleta = Pontocoleta::find($id);

        return view('admin.pontocoleta.edit',compact('pontocoleta'));
    }


    public function update( $id, PontocoletaUpdateRequest $request)
    {
        $pontocoleta = Pontocoleta::find($id);

        $pontocoleta->update($request->all());

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
