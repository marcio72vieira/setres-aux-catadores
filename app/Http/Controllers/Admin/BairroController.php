<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BairroRequest;
use App\Http\Requests\BairroUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Bairro;

use Illuminate\Support\Facades\Validator;   //Validação unique
use Illuminate\Validation\Rule;             //Validação unique

class BairroController extends Controller
{

    public function index()
    {
        $bairros = Bairro::all();

        return view('admin.bairro.index', compact('bairros'));
    }


    public function create()
    {
        return view('admin.bairro.create');
    }


    public function store(BairroRequest $request)
    {
        Bairro::create($request->all());

        $request->session()->flash('sucesso', 'Registro incluído com sucesso!');

        return redirect()->route('admin.bairro.index');
    }


    public function show($id)
    {
        $bairro = Bairro::find($id);

        return view('admin.bairro.show', compact('bairro'));


    }


    public function edit($id)
    {
        $bairro = Bairro::find($id);

        return view('admin.bairro.edit', compact('bairro'));
    }


    public function update($id, BairroUpdateRequest $request)
    {
        $bairro = Bairro::find($id);

        // Validação unique
        Validator::make($request->all(), [
            'nome' => [
                'required',
                Rule::unique('bairros')->ignore($bairro->id),
            ],
        ]);


        $bairro->update($request->all());

        $request->session()->flash('sucesso', 'Registro atualizado com sucesso!');

        return redirect()->route('admin.bairro.index');
    }


    public function destroy($id, Request $request)
    {
        Bairro::destroy($id);

        $request->session()->flash('sucesso', 'Registro excluído com sucesso!');

        return redirect()->route('admin.bairro.index');
    }
}
