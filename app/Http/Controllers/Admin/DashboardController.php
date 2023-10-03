<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\JoinClause;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtendo a quantidade de registros das tabelas
        $qtdMunicipios = Dashboard::quantidadeMunicipios();
        $qtdBairros =  Dashboard::quantidadeBairros();
        $qtdPontoColetas = Dashboard::quantidadePontosDeColeta();
        $qtdResiduos = Dashboard::quantidadeResiduos();
        $qtdAssMasc = Dashboard::quantidadeAssMasculino();
        $qtdAssFemi = Dashboard::quantidadeAssFeminino();
        $qtdAssCoop = Dashboard::quantidadeAssCooperados();
        $qtdAssAssoc = Dashboard::quantidadeAssAssociados();
        $qtdAssAvul = Dashboard::quantidadeAssAvulsos();
        $qtdAssInform = Dashboard::quantidadeAssInformal();
        $qtdAssIndef = Dashboard::quantidadeAssIndefinido();
        $qtdComphAssoc = Dashboard::quantidadeComphassociacao();
        $qtdComphCoop = Dashboard::quantidadeComphcooperativa();
        $qtdComphGrupAvuls = Dashboard::quantidadeComphGrupoAvulso();
        $qtdComphGrupInfom =  Dashboard::quantidadeComphGrupoInformal();
        $qtdComphGrupIndef =  Dashboard::quantidadeComphGrupoIndefinido();

        $municipios = Dashboard::municipios();


        return view('admin.dashboard.index', compact(
                'qtdMunicipios', 'qtdBairros', 'qtdPontoColetas', 'qtdResiduos',
                'qtdAssMasc', 'qtdAssFemi',
                'qtdAssCoop', 'qtdAssAssoc', 'qtdAssAvul', 'qtdAssInform', 'qtdAssIndef',
                'qtdComphAssoc', 'qtdComphCoop', 'qtdComphGrupAvuls', 'qtdComphGrupInfom', 'qtdComphGrupIndef',
                'municipios'
            )
        );
    }


    public function ajaxgetCompanhiasMunicipio(Request $request)
    {

        $municipio = $request->idMunicipio;
        $data = [];

        $detalhesresiduos =    DB::table('companhias')
                                    ->join('municipios', 'municipios.id', '=', 'companhias.municipio_id')
                                    ->leftJoin('companhia_residuo', 'companhia_residuo.companhia_id', '=', 'companhias.id')
                                    ->leftJoin('residuos', 'residuos.id', '=', 'companhia_residuo.residuo_id')
                                    ->select(DB::RAW('companhias.id AS idCompanhia, companhias.nome AS companhia_nome,
                                            CASE companhias.tipo
                                                WHEN "associacao"       THEN "Associação"
                                                WHEN "cooperativa"      THEN "Cooperativa"
                                                WHEN "grupoavulso"      THEN "Avulsa"
                                                WHEN "grupoinformal"    THEN "Informal"
                                                WHEN "indefinido"       THEN "Indefinido"
                                            END AS companhia_tipo,
                                            COUNT(companhia_residuo.residuo_id) AS residuo_total,
                                            GROUP_CONCAT(residuos.nome SEPARATOR ", ") as nomeResiduo,
                                            COUNT(DISTINCT(companhias.tipo)) AS totalcompanhia_unica'
                                    )
                                )
                                ->where('municipios.id', '=', $municipio )
                                ->groupBy('companhias.id')
                                ->orderBy('companhias.id');


        $detalhespontocoletas = DB::table('pontocoletas')->rightJoinSub($detalhesresiduos, 'aliasResiduos', function ($join) {
                                    $join->on('pontocoletas.companhia_id', '=', 'aliasResiduos.idCompanhia');
                                })->select(DB::raw('aliasResiduos.idCompanhia, aliasResiduos.companhia_nome, aliasResiduos.companhia_tipo, aliasResiduos.totalcompanhia_unica,
                                            aliasResiduos.residuo_total, aliasResiduos.nomeResiduo,
                                            COUNT(DISTINCT pontocoletas.id) AS pontocoleta_total'))
                                ->groupBy('aliasResiduos.idCompanhia');



        $detalhesassociados = DB::table('associados')->rightJoinSub($detalhespontocoletas, 'aliasPontoscoletas', function ($join) {
                                    $join->on('associados.companhia_id', '=', 'aliasPontoscoletas.idCompanhia');
                                })->select(DB::raw('aliasPontoscoletas.idCompanhia, aliasPontoscoletas.companhia_nome, aliasPontoscoletas.companhia_tipo, aliasPontoscoletas.totalcompanhia_unica,
                                            aliasPontoscoletas.residuo_total, aliasPontoscoletas.nomeResiduo,
                                            aliasPontoscoletas.pontocoleta_total,
                                            COUNT(DISTINCT associados.id) AS companhia_totalcatadores,
                                            COUNT(IF(associados.sexo = "m", 1, NULL)) AS companhia_totalmasc,
                                            COUNT(IF(associados.sexo = "f", 1, NULL)) AS companhia_totalfeme,
                                            COUNT(IF(associados.carteiraemitida = 1, 1, NULL)) AS companhia_totalcomcarteira,
                                            COUNT(IF(associados.carteiraemitida = 0, 1, NULL)) AS companhia_totalsemcarteira'))
                                ->groupBy('aliasPontoscoletas.idCompanhia')->get();


        $data['dados'] =  $detalhesassociados;
        return response()->json($data);









    }

}
