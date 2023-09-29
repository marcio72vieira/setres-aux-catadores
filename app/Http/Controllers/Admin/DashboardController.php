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

        $companhias = DB::table('companhias')
                   ->select('id','nome AS companhia_nome', DB::raw('CASE tipo
                                                                WHEN "associacao" THEN "Associação"
                                                                WHEN "cooperativa" THEN "Cooperativa"
                                                                WHEN "grupoavulso" THEN "Avulsa"
                                                                WHEN "grupoinformal" THEN "Informal"
                                                                WHEN "indefinido" THEN "Indefinido"
                                                                END AS companhia_tipo'))
                   ->where('municipio_id', '=', $municipio);


        $associados = DB::table('associados')->joinSub($companhias, 'companhiaAlias', function ($join) {
            $join->on('associados.companhia_id', '=', 'companhiaAlias.id');
        })->select(DB::raw('companhiaAlias.companhia_nome, companhiaAlias.companhia_tipo, COUNT(*) AS companhia_totalcatadores, SUM(IF(associados.sexo = "m", 1, 0)) AS companhia_totalmasc, SUM(IF(associados.sexo = "f", 1, 0)) AS companhia_totalfeme, SUM(IF(associados.carteiraemitida = 1, 1, 0)) AS companhia_totalcomcarteira, SUM(IF(associados.carteiraemitida = 0, 1, 0)) AS companhia_totalsemcarteira'))->groupBy('companhiaAlias.id')->get();


        $data['dados'] =  $associados;
        return response()->json($data);


        /*******************
        $records = DB::table('companhias')
                ->join('municipios', 'municipios.id', '=', 'companhias.municipio_id')
                ->join('associados', 'associados.companhia_id', '=', 'companhias.id')
                ->leftJoin('pontocoletas', 'pontocoletas.companhia_id', '=', 'companhias.id')
                ->select(DB::RAW('companhias.nome AS companhia_nome,
                                    CASE
                                        companhias.tipo
                                            WHEN "associacao" THEN "Associação"
                                            WHEN "cooperativa" THEN "Cooperativa"
                                            WHEN "grupoavulso" THEN "Avulsa"
                                            WHEN "grupoinformal" THEN "Informal"
                                            WHEN "indefinido" THEN "Indefinido"
                                    END AS companhia_tipo,
                                    COUNT(DISTINCT pontocoletas.id) AS pontocoleta_total,
                                    COUNT(DISTINCT associados.id) AS companhia_totalcatadores,
                                    SUM(IF(associados.sexo = "m", 1, 0)) AS companhia_totalmasc,
                                    SUM(IF(associados.sexo = "f", 1, 0)) AS companhia_totalfeme,
                                    SUM(IF(associados.carteiraemitida = 1, 1, 0)) AS companhia_totalcomcarteira,
                                    SUM(IF(associados.carteiraemitida = 0, 1, 0)) AS companhia_totalsemcarteira'))
                ->groupBy('companhias.id')
                ->where('companhias.municipio_id', '=', $municipio)->get();

        $data['dados'] =  $records;
        return response()->json($data);
        *************************/







        /*
        QUERY VÁLIDAS

        $municipio = $request->idMunicipio;
        $data = [];

        $records = DB::table('companhias')
            ->join('associados', 'associados.companhia_id', '=', 'companhias.id')
            ->leftJoin('pontocoletas', 'pontocoletas.companhia_id', '=', 'companhias.id')
            ->join('municipios', 'municipios.id', '=', 'companhias.municipio_id')
            ->select(DB::RAW('companhias.nome AS companhia_nome,
                                CASE
                                    companhias.tipo
                                        WHEN "associacao" THEN "Associação"
                                        WHEN "cooperativa" THEN "Cooperativa"
                                        WHEN "grupoavulso" THEN "Avulsa"
                                        WHEN "grupoinformal" THEN "Informal"
                                        WHEN "indefinido" THEN "Indefinido"
                                END AS companhia_tipo,
                                COUNT(DISTINCT associados.id) AS companhia_totalcatadores,
                                COUNT(DISTINCT pontocoletas.id) AS companhia_totalpontocoleta,
                                SUM(IF(associados.sexo = "m", 1, 0)) AS companhia_totalmasc,
                                SUM(IF(associados.sexo = "f", 1, 0)) AS companhia_totalfeme,
                                SUM(IF(associados.carteiraemitida = 1, 1, 0)) AS companhia_totalcomcarteira,
                                SUM(IF(associados.carteiraemitida = 0, 1, 0)) AS companhia_totalsemcarteira'))
            ->groupBy('companhias.id')
            ->where('companhias.municipio_id', '=', $municipio)->get();




        $records = DB::table('companhias')
        ->join('associados', 'associados.companhia_id', '=', 'companhias.id')
        ->leftJoin('pontocoletas', 'pontocoletas.companhia_id', '=', 'companhias.id')   // Nem todas as companhias possui ponto de coletas, ou seja, o valor é null, por isso houve a necessidade de se utilizar leftJoin neste ponto
        ->join('municipios', 'municipios.id', '=', 'companhias.municipio_id')
        ->select('companhias.nome AS companhia_nome', 'companhias.tipo AS companhia_tipo')
        ->groupBy('companhias.id')
        ->where('companhias.municipio_id', '=', $municipio)->get();


        $records = DB::select(DB::raw("SELECT nome AS companhia_nome,
                                        CASE tipo
                                            WHEN 'associacao' THEN 'Associação'
                                            WHEN 'cooperativa' THEN 'Cooperativa'
                                            WHEN 'grupoavulso' THEN 'Avulsa'
                                            WHEN 'grupoinformal' THEN 'Informal'
                                            WHEN 'indefinido' THEN 'Indefinido'
                                        END AS companhia_tipo FROM companhias WHERE municipio_id = $municipio ORDER BY nome ASC"));

        $data['dados'] =  $records;
        return response()->json($data);


        SQL GERADA
        select companhias.nome AS companhia_nome,
		CASE companhias.tipo
        	WHEN "associacao" THEN "Associação"
            WHEN "cooperativa" THEN "Cooperativa"
            WHEN "grupoavulso" THEN "Avulsa"
            WHEN "grupoinformal" THEN "Informal"
            WHEN "indefinida" THEN "Indefinida"
         END AS companhia_tipo,
         	COUNT(*) AS companhia_totalasociados,
            SUM(IF(associados.sexo = "m", 1, 0)) AS companhia_totalmasc,
            SUM(IF(associados.sexo = "f", 1, 0)) AS companhia_totalfeme,
            SUM(IF(associados.carteiraemitida = 1, 1, 0)) AS companhia_totalcomcarteira,
            SUM(IF(associados.carteiraemitida = 0, 1, 0)) AS companhia_totalsemcarteira
            from `companhias`
            	inner join `municipios` on `municipios`.`id` = `companhias`.`municipio_id`
                inner join `associados` on `associados`.`companhia_id` = `companhias`.`id`
             WHERE
             	`companhias`.`municipio_id` = 1 group by `companhias`.`id`;

        */

        /* SUBSELECT
        $municipio = $request->idMunicipio;
        $data = [];

        $record = DB::table('companhias')
        ->join('municipios', 'municipios.id', '=', 'companhias.municipio_id')
        ->join('associados', 'associados.companhia_id', '=', 'companhias.id')
        ->select(DB::RAW('companhias.id, companhias.nome AS companhia_nome,
                            CASE
                                companhias.tipo
                                    WHEN "associacao" THEN "Associação"
                                    WHEN "cooperativa" THEN "Cooperativa"
                                    WHEN "grupoavulso" THEN "Avulsa"
                                    WHEN "grupoinformal" THEN "Informal"
                                    WHEN "indefinido" THEN "Indefinido"
                            END AS companhia_tipo,
                            COUNT(*) AS companhia_totalcatadores,
                            SUM(IF(associados.sexo = "m", 1, 0)) AS companhia_totalmasc,
                            SUM(IF(associados.sexo = "f", 1, 0)) AS companhia_totalfeme,
                            SUM(IF(associados.carteiraemitida = 1, 1, 0)) AS companhia_totalcomcarteira,
                            SUM(IF(associados.carteiraemitida = 0, 1, 0)) AS companhia_totalsemcarteira'))
        ->groupBy('companhias.id')
        ->where('companhias.municipio_id', '=', $municipio);

        // Subselect
        $records = DB::table('pontocoletas')
        ->rightJoinSub($record, 'pontos', function ($join) {
            $join->on('pontocoletas.companhia_id', '=', 'pontos.id');
        })->select(DB::RAW('COUNT(DISTINCT pontocoletas.id) AS pontocoleta_total'))->get();

        $data['dados'] =  $records;
        return response()->json($data);
        */

    }

}
