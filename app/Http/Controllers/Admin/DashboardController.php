<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


        // $records = DB::select(DB::raw("SELECT produto_nome as nome, af, SUM(IF(af = 'nao', precototal, 0)) as totalcompranormal, SUM(IF(af = 'sim', precototal, 0)) as totalcompraaf, SUM(precototal) as totalcompra FROM bigtable_data WHERE MONTH(data_ini) = $mes_corrente AND YEAR(data_ini) = $ano_corrente GROUP BY produto_id ORDER BY totalcompra ASC"));
        //        $data['titulo'] = "COMPRAS POR PRODUTOS (NORMAL x AF)";

        // $data['labels'] = $dataEmpilhadoLabels;
        // $data['compranormal'] = $dataEmpilhadoRecordsNormal;
        // $data['compraaf'] =  $dataEmpilhadoRecordsAf;
        // $data['dados'] =  $records;

        $records = DB::select(DB::raw("SELECT nome AS companhia_nome, tipo AS companhia_tipo FROM companhias WHERE municipio_id = $municipio ORDER BY nome ASC"));
        $data['dados'] =  $records;



        return response()->json($data);
    }

}
