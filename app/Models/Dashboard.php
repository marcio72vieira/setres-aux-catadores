<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dashboard extends Model
{
    use HasFactory;


    // Retorna a quantidade de Municípios
    public static function quantidadeMunicipios()
    {
        $qtdMunicipios = DB::table('municipios')->count();
        return $qtdMunicipios;
    }

    // Retorna a quantidade de Bairros
    public static function quantidadeBairros()
    {
        $qtdBairros = DB::table('bairros')->count();
        return $qtdBairros;
    }

    // Retorna a quantidade de Pontos de Coleta
    public static function quantidadePontosDeColeta()
    {
        $qtdBairros = DB::table('pontocoletas')->count();
        return $qtdBairros;
    }

    // Retorna a quantidade de Resíduos
    public static function quantidadeResiduos()
    {
        $qtdResiduos = DB::table('residuos')->count();
        return $qtdResiduos;
    }

    // Retorna a quantidade de Associados Masculino
    public static function quantidadeAssMasculino()
    {
        $qtdAssMasc = DB::table('associados')->where('sexo', '=', 'm')->count();
        return $qtdAssMasc;
    }

    // Retorna a quantidade de Associados Masculino
    public static function quantidadeAssFeminino()
    {
        $qtdAssFemi = DB::table('associados')->where('sexo', '=', 'f')->count();
        return $qtdAssFemi;
    }

    // Retorna a quantidade de Associados de Cooperativas
    public static function quantidadeAssCooperados()
    {
        $qtdAssCoop = DB::table('associados')->where('tipo', '=', 'cooperado')->count();
        return $qtdAssCoop;
    }
}
