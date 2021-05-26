<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Associado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
        // $associados = Associado::all();

        $associados = DB::table('associados')
        ->join('companhias', 'companhias.id', '=', 'associados.companhia_id')
        ->join('municipios', 'municipios.id', '=', 'associados.municipio_id')
        ->join('bairros', 'bairros.id', '=', 'associados.bairro_id')
        ->select(
            'associados.id',
            'associados.nome',
            'associados.nascimento',
            'associados.rg',
            'associados.rgorgaoemissor',
            'associados.cpf',
            'associados.sexo',
            'associados.racacor',
            'associados.filiacao',
            'associados.quantidade',
            'associados.endereco',
            'associados.numero',
            'associados.bairro_id',
            'bairros.nome AS nomebairro',
            'associados.complemento',
            'associados.municipio_id',
            'municipios.nome AS nomemunicipio',
            'associados.zona',
            'associados.foneum',
            'associados.fonedois',
            'associados.imagem',
            'associados.idqrcode',
            'associados.imagemqrcode',
            'associados.companhia_id',
            'companhias.nome AS nomecompanhia',
            'associados.created_at',
            'associados.updated_at',)
        ->orderBy('associados.id', 'ASC')
        ->get();

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
        //$associado = Associado::where('id', '=', $id)->get();

        $associado = DB::table('associados')
        ->join('companhias', 'companhias.id', '=', 'associados.companhia_id')
        ->join('municipios', 'municipios.id', '=', 'associados.municipio_id')
        ->join('bairros', 'bairros.id', '=', 'associados.bairro_id')
        ->select(
            'associados.id',
            'associados.nome',
            'associados.nascimento',
            'associados.rg',
            'associados.rgorgaoemissor',
            'associados.cpf',
            'associados.sexo',
            'associados.racacor',
            'associados.filiacao',
            'associados.quantidade',
            'associados.endereco',
            'associados.numero',
            'associados.bairro_id',
            'bairros.nome AS nomebairro',
            'associados.complemento',
            'associados.municipio_id',
            'municipios.nome AS nomemunicipio',
            'associados.zona',
            'associados.foneum',
            'associados.fonedois',
            'associados.imagem',
            'associados.idqrcode',
            'associados.imagemqrcode',
            'associados.companhia_id',
            'companhias.nome AS nomecompanhia',
            'associados.created_at',
            'associados.updated_at',)
        ->where('associados.id', '=', $id )
        ->get();

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
