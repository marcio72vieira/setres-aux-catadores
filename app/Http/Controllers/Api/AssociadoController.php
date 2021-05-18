<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Associado;
use Illuminate\Http\Request;


class AssociadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // postman GET = http://localhost:8000/api/associados

        $associados = Associado::all();
        return response()->json($associados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // postman GET = http://localhost:8000/api/associado/1

        $associado = Associado::where('id', '=', $id)->get();
        return response()->json($associado);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function exibeassociado($qrcode)
    {

        // postman GET = http://localhost:8000/api/associado/16213427082/dados

        $associado = Associado::where('idqrcode', '=', $qrcode)->get();
        return response()->json($associado);
    }
}
