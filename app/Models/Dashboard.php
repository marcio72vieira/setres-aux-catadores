<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

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
        $qtdPontoColetas = DB::table('pontocoletas')->count();
        return $qtdPontoColetas;
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

    // Retorna a quantidade de Catadores Cooperados
    public static function quantidadeAssCooperados()
    {
        $qtdAssCoop = DB::table('associados')->where('tipo', '=', 'cooperado')->count();
        return $qtdAssCoop;
    }

     // Retorna a quantidade de Catadores Associados
     public static function quantidadeAssAssociados()
     {
         $qtdAssAssoc = DB::table('associados')->where('tipo', '=', 'associado')->count();
         return $qtdAssAssoc;
     }

     // Retorna a quantidade de Catadores Avulsos
     public static function quantidadeAssAvulsos()
     {
         $qtdAssAvul = DB::table('associados')->where('tipo', '=', 'avulso')->count();
         return $qtdAssAvul;
     }

      // Retorna a quantidade de Catadores Informal
      public static function quantidadeAssInformal()
      {
          $qtdAssInform = DB::table('associados')->where('tipo', '=', 'informal')->count();
          return $qtdAssInform;
      }

      // Retorna a quantidade de Catadores Indefinido
      public static function quantidadeAssIndefinido()
      {
          $qtdAssIndef = DB::table('associados')->where('tipo', '=', 'indefinido')->count();
          return $qtdAssIndef;
      }


      // Retorna a quantidade de Companhias Associações
      public static function quantidadeComphassociacao()
      {
        $qtdCompAssociacao = DB::table('companhias')->where('tipo', '=', 'associacao')->count();
        return $qtdCompAssociacao;
      }

      // Retorna a quantidade de Companhias Cooperativas
      public static function quantidadeComphcooperativa()
      {
        $qtdCompCooperativa = DB::table('companhias')->where('tipo', '=', 'cooperativa')->count();
        return $qtdCompCooperativa;
      }

     // Retorna a quantidade de Companhias Grupos avulsos
     public static function quantidadeComphGrupoAvulso()
     {
       $qtdCompGrupoAvulso = DB::table('companhias')->where('tipo', '=', 'grupoavulso')->count();
       return $qtdCompGrupoAvulso;
     }

    // Retorna a quantidade de Companhias Grupos informais
    public static function quantidadeComphGrupoInformal()
    {
      $qtdCompGrupoInform = DB::table('companhias')->where('tipo', '=', 'grupoinformal')->count();
      return $qtdCompGrupoInform;
    }

    // Retorna a quantidade de Companhias Grupos informais
    public static function quantidadeComphGrupoIndefinido()
    {
      $qtdCompGrupoIndef = DB::table('companhias')->where('tipo', '=', 'indefinido')->count();
      return $qtdCompGrupoIndef;
    }

    // Retorna a quantidade de Associados com carteiras emitidas
    public static function quantidadeComCarteira()
    {
        $qtdComCart = DB::table('associados')->where('carteiraemitida', '=', 1)->count();
        return $qtdComCart;
    }

    // Retorna a quantidade de Associados sem carteiras emitidas
    public static function quantidadeSemCarteira()
    {
        $qtdSemCart = DB::table('associados')->where('carteiraemitida', '=', 0)->count();
        return $qtdSemCart;
    }


    public static function municipios() {
        $municipios = DB::table('municipios')->select('id', 'nome', )->orderBy('nome')->get();
        return $municipios;
    }


    public static function dadosGerais() {
        $dadosGerais =  array();

        $qtdMunicipios  = DB::table('municipios')->count();
        $qtdBairros     = DB::table('bairros')->count();
        $qtdPontoColetas   = DB::table('pontocoletas')->count();
        $qtdResiduos = DB::table('residuos')->count();
        $qtdAssMasc = DB::table('associados')->where('sexo', '=', 'm')->count();
        $qtdAssFemi = DB::table('associados')->where('sexo', '=', 'f')->count();
        $qtdComCart = DB::table('associados')->where('carteiraemitida', '=', 1)->count();
        $qtdSemCart = DB::table('associados')->where('carteiraemitida', '=', 0)->count();
        $qtdAssAssoc = DB::table('associados')->where('tipo', '=', 'associado')->count();
        $qtdAssCoop = DB::table('associados')->where('tipo', '=', 'cooperado')->count();
        $qtdAssAvul = DB::table('associados')->where('tipo', '=', 'avulso')->count();
        $qtdAssInform = DB::table('associados')->where('tipo', '=', 'informal')->count();
        $qtdAssIndef = DB::table('associados')->where('tipo', '=', 'indefinido')->count();
        $qtdCompAssociacao = DB::table('companhias')->where('tipo', '=', 'associacao')->count();
        $qtdCompCooperativa = DB::table('companhias')->where('tipo', '=', 'cooperativa')->count();
        $qtdCompGrupoAvulso = DB::table('companhias')->where('tipo', '=', 'grupoavulso')->count();
        $qtdCompGrupoInform = DB::table('companhias')->where('tipo', '=', 'grupoinformal')->count();
        $qtdCompGrupoIndef = DB::table('companhias')->where('tipo', '=', 'indefinido')->count();

        $dadosGerais = [
            'qtdMunicipios'     => $qtdMunicipios,
            'qtdBairros'        => $qtdBairros,
            'qtdPontoColetas'   => $qtdPontoColetas,
            'qtdResiduos'       => $qtdResiduos,
            'qtdAssTotal'       => $qtdAssMasc + $qtdAssFemi,
            'qtdAssMasc'        => $qtdAssMasc,
            'qtdAssFemi'        => $qtdAssFemi,
            'qtdComCart'        => $qtdComCart,
            'qtdSemCart'        => $qtdSemCart,
            'qtdAssAssoc'       => $qtdAssAssoc,
            'qtdAssCoop'        => $qtdAssCoop,
            'qtdAssAvul'        => $qtdAssAvul,
            'qtdAssInform'      => $qtdAssInform,
            'qtdAssIndef'       => $qtdAssIndef,
            'qtdCompAssociacao' => $qtdCompAssociacao,
            'qtdCompCooperativa' => $qtdCompCooperativa,
            'qtdCompGrupoAvulso' => $qtdCompGrupoAvulso,
            'qtdCompGrupoInform' => $qtdCompGrupoInform,
            'qtdCompGrupoIndef' => $qtdCompGrupoIndef
        ];

        return $dadosGerais;

    }



}

