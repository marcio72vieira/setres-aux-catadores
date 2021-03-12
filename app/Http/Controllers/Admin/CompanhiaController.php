<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanhiaRequest;
use Illuminate\Http\Request;
use App\Models\Companhia;

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
