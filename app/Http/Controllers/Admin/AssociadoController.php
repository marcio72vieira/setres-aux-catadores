<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bairro;
use App\Models\Associado;


class AssociadoController extends Controller
{

    public function index()
    {
        $associados = Associado::all();

        return view('admin.associado.index', compact('associados'));

    }


    public function create()
    {
        $bairros = Bairro::all();

        return view('admin.associado.create', compact('bairros'));

    }


    public function store(Request $request)
    {
        //
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
