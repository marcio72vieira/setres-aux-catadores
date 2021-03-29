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
}
