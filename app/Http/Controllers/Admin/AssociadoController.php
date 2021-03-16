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
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
