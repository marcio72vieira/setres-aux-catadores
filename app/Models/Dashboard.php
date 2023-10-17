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

    public static function dadosMunicipioIndividual($idMunicipio)
    {
        $municipio = $idMunicipio;

        //$data = [];

        // Obs: As consultas foram feitas levando em conta primeiramente os resíduos e depois os pontos de coletas, porque
        //      a quantidade de porntos de coletas influencia na quantidade COUNT do sexo e carteira dos catadores, multimpli
        //      cando a quantidade por sexo e carteira pela quantidade de pontos de coletas, não calculando a quantidade real
        //      de catadores cadastrados na companhia.
        $detalhesresiduos =    DB::table('companhias')
                                    ->join('municipios', 'municipios.id', '=', 'companhias.municipio_id')
                                    ->leftJoin('companhia_residuo', 'companhia_residuo.companhia_id', '=', 'companhias.id')
                                    ->leftJoin('residuos', 'residuos.id', '=', 'companhia_residuo.residuo_id')
                                    ->select(DB::RAW('municipios.nome AS municipio_nome, companhias.id AS idCompanhia,
                                                      COUNT(DISTINCT(companhias.id)) AS companhia_total,
                                                      COUNT(DISTINCT(companhias.tipo)) AS companhia_tipototal,
                                                      companhias.nome AS companhia_nome,
                                                      CASE companhias.tipo
                                                        WHEN "associacao"       THEN "Associação"
                                                        WHEN "cooperativa"      THEN "Cooperativa"
                                                        WHEN "grupoavulso"      THEN "Avulsa"
                                                        WHEN "grupoinformal"    THEN "Informal"
                                                        WHEN "indefinido"       THEN "Indefinido"
                                                      END AS companhia_tipo,
                                                      COUNT(companhia_residuo.residuo_id) AS residuo_total,
                                                      GROUP_CONCAT(residuos.nome SEPARATOR ", ") as nomeResiduo'
                                    )
                                )
                                ->where('municipios.id', '=', $municipio )
                                ->groupBy('companhias.id')
                                ->orderBy('companhias.id');


        $detalhespontocoletas = DB::table('pontocoletas')->rightJoinSub($detalhesresiduos, 'aliasResiduos', function ($join) {
                                    $join->on('pontocoletas.companhia_id', '=', 'aliasResiduos.idCompanhia');
                                })->select(DB::raw('aliasResiduos.municipio_nome, aliasResiduos.idCompanhia, aliasResiduos.companhia_nome, aliasResiduos.companhia_tipo, aliasResiduos.companhia_total, aliasResiduos.companhia_tipototal,
                                            aliasResiduos.residuo_total, aliasResiduos.nomeResiduo,
                                            COUNT(DISTINCT pontocoletas.id) AS pontocoleta_total'))
                                ->groupBy('aliasResiduos.idCompanhia');



        $detalhesassociados = DB::table('associados')->rightJoinSub($detalhespontocoletas, 'aliasPontoscoletas', function ($join) {
                                    $join->on('associados.companhia_id', '=', 'aliasPontoscoletas.idCompanhia');
                                })->select(DB::raw('aliasPontoscoletas.municipio_nome, aliasPontoscoletas.idCompanhia, aliasPontoscoletas.companhia_nome, aliasPontoscoletas.companhia_tipo, aliasPontoscoletas.companhia_total, aliasPontoscoletas.companhia_tipototal,
                                            aliasPontoscoletas.residuo_total, aliasPontoscoletas.nomeResiduo,
                                            aliasPontoscoletas.pontocoleta_total,
                                            COUNT(DISTINCT associados.id) AS companhia_totalcatadores,
                                            COUNT(IF(associados.sexo = "m", 1, NULL)) AS companhia_totalmasc,
                                            COUNT(IF(associados.sexo = "f", 1, NULL)) AS companhia_totalfeme,
                                            COUNT(IF(associados.carteiraemitida = 1, 1, NULL)) AS companhia_totalcomcarteira,
                                            COUNT(IF(associados.carteiraemitida = 0, 1, NULL)) AS companhia_totalsemcarteira'))
                                ->groupBy('aliasPontoscoletas.idCompanhia')->get();


        $data =  $detalhesassociados;
        return $data;
    }



}

