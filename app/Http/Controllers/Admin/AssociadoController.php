<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AssociadoRequest;
use App\Http\Requests\AssociadoUpdateRequest;
use App\Models\Companhia;
use App\Models\Bairro;
use App\Models\Associado;
use Illuminate\Support\Facades\DB;

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
        $companhias = Companhia::all();
        $bairros = Bairro::all();


        return view('admin.associado.create', compact('companhias','bairros'));

    }


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


    public function show($id)
    {
        $associado = Associado::with(['companhia', 'bairros'])->find($id);
        $companhias = Companhia::all();
        $bairros = Bairro::all();

        return view('admin.associado.show', compact('associado', 'companhias','bairros'));
    }


    public function edit($id)
    {
        $associado = Associado::with(['companhia', 'bairros'])->find($id);
        $companhias = Companhia::all();
        $bairros = Bairro::all();

        return view('admin.associado.edit', compact('associado', 'companhias','bairros'));
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

            if($request->has('bairros')){
                $associado->bairros()->sync($request->bairros);
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
}
