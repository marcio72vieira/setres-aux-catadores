<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanhiaRequest;
use App\Http\Requests\CompanhiaUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Companhia;

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
        return view('admin.companhia.create');
    }


    public function store(CompanhiaRequest $request)
    {
        //dd($request->all());

        Companhia::create($request->all());

        $request->session()->flash('sucesso', 'Registro incluído com sucesso!');

        return redirect()->route('admin.companhia.index');
    }


    public function show($id)
    {
        $companhia = Companhia::find($id);

        return view('admin.companhia.show', compact('companhia'));
    }


    public function edit($id)
    {
        $companhia = Companhia::find($id);
        return view('admin.companhia.edit', compact('companhia'));
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


        $companhia->update($request->all());

        $request->session()->flash('sucesso', 'Registro atualizado com sucesso!');

        return redirect()->route('admin.companhia.index');
    }


    public function destroy($id, Request $request)
    {
        Companhia::destroy($id);

        $request->session()->flash('sucesso', 'Registro excluído com sucesso!');

        return redirect()->route('admin.companhia.index');
    }
}
