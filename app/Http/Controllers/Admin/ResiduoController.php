<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResiduoRequest;
use Illuminate\Http\Request;
use App\Models\Residuo;

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


    public function update($id, ResiduoRequest $request)
    {
        $residuo = Residuo::find($id);
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
}
