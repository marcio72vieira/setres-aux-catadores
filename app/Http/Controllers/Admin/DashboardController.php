<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\JoinClause;
use App\Models\Municipio;

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
        $qtdComCarteira =  Dashboard::quantidadeComCarteira();
        $qtdSemCarteira = Dashboard::quantidadeSemCarteira();

        $municipios = Dashboard::municipios();


        return view('admin.dashboard.index', compact(
                'qtdMunicipios', 'qtdBairros', 'qtdPontoColetas', 'qtdResiduos',
                'qtdAssMasc', 'qtdAssFemi',
                'qtdAssCoop', 'qtdAssAssoc', 'qtdAssAvul', 'qtdAssInform', 'qtdAssIndef',
                'qtdComphAssoc', 'qtdComphCoop', 'qtdComphGrupAvuls', 'qtdComphGrupInfom', 'qtdComphGrupIndef',
                'municipios', 'qtdComCarteira', 'qtdSemCarteira'
            )
        );
    }


    public function ajaxgetCompanhiasMunicipio(Request $request)
    {

        $municipio = $request->idMunicipio;
        $data = [];

        // Obs: As consultas foram feitas levando em conta primeiramente os resíduos e depois os pontos de coletas, porque
        //      a quantidade de porntos de coletas influencia na quantidade COUNT do sexo e carteira dos catadores, multimpli
        //      cando a quantidade por sexo e carteira pela quantidade de pontos de coletas, não calculando a quantidade real
        //      de catadores cadastrados na companhia.
        $detalhesresiduos =    DB::table('companhias')
                                    ->join('municipios', 'municipios.id', '=', 'companhias.municipio_id')
                                    ->leftJoin('companhia_residuo', 'companhia_residuo.companhia_id', '=', 'companhias.id')
                                    ->leftJoin('residuos', 'residuos.id', '=', 'companhia_residuo.residuo_id')
                                    ->select(DB::RAW('companhias.id AS idCompanhia,
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
                                })->select(DB::raw('aliasResiduos.idCompanhia, aliasResiduos.companhia_nome, aliasResiduos.companhia_tipo, aliasResiduos.companhia_total, aliasResiduos.companhia_tipototal,
                                            aliasResiduos.residuo_total, aliasResiduos.nomeResiduo,
                                            COUNT(DISTINCT pontocoletas.id) AS pontocoleta_total'))
                                ->groupBy('aliasResiduos.idCompanhia');



        $detalhesassociados = DB::table('associados')->rightJoinSub($detalhespontocoletas, 'aliasPontoscoletas', function ($join) {
                                    $join->on('associados.companhia_id', '=', 'aliasPontoscoletas.idCompanhia');
                                })->select(DB::raw('aliasPontoscoletas.idCompanhia, aliasPontoscoletas.companhia_nome, aliasPontoscoletas.companhia_tipo, aliasPontoscoletas.companhia_total, aliasPontoscoletas.companhia_tipototal,
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




    // Configuração de Relatórios PDFs
    public function relatoriodashboard()
    {
        $informacoesGerais = Dashboard::dadosGerais();

        $fileName = ('Municipios_geral.pdf');


        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 25,
            'margin_bottom' => 15,
            'margin-header' => 10,
            'margin_footer' => 5
        ]);

        $mpdf->SetHTMLHeader('
            <table style="width:717px; border-bottom: 1px solid #000000; margin-bottom: 3px;">
                <tr>
                    <td style="width: 83px">
                        <img src="images/logo-ma.png" width="80"/>
                    </td>
                    <td style="width: 282px; font-size: 10px; font-family: Arial, Helvetica, sans-serif;">
                        Governo do Estado do Maranhão<br>
                        Secretaria de Governo<br>
                        Secreatia Adjunta de Tecnologia da Informação/SEATI<br>
                        Secretaria do Trabalho e Economia Solidaria/SETRES
                    </td>
                    <td style="width: 352px;" class="titulo-rel">
                        INFORMAÇÕES GERAIS
                    </td>
                </tr>
            </table>
        ');

        $mpdf->SetHTMLFooter('
            <table style="width:717px; border-top: 1px solid #000000; font-size: 10px; font-family: Arial, Helvetica, sans-serif;">
                <tr>
                    <td width="239px">São Luis(MA) {DATE d/m/Y}</td>
                    <td width="239px" align="center"></td>
                    <td width="239px" align="right">{PAGENO}/{nbpg}</td>
                </tr>
            </table>
        ');

        $html = \View::make('admin.dashboard.pdf.pdfrelatoriodashboard', compact('informacoesGerais'));
        $html = $html->render();

        $stylesheet = file_get_contents('pdf/mpdf.css');
        $mpdf->WriteHTML($stylesheet, 1);

        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName, 'I');

        //return view('admin.residuo.pdf.pdfresiduogeral', compact('residuos'));
    }



    public function relatoriomunicipiogeral($id = null)
    {
        $municipios = Municipio::all();

        $fileName = ('Municipios_geral.pdf');


        $mpdf = new \Mpdf\Mpdf([
            'orientation' => 'L',
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 37,
            'margin_bottom' => 15,
            'margin-header' => 10,
            'margin_footer' => 5
        ]);

        $mpdf->SetHTMLHeader('
            <table style="width:1080px; border-bottom: 1px solid #000000; margin-bottom: 3px;">
                <tr>
                    <td style="width: 108px">
                        <img src="images/logo-ma.png" width="80"/>
                    </td>
                    <td style="width: 432px; font-size: 10px; font-family: Arial, Helvetica, sans-serif;">
                        Governo do Estado do Maranhão<br>
                        Secretaria de Governo<br>
                        Secreatia Adjunta de Tecnologia da Informação/SEATI<br>
                        Secretaria do Trabalho e Economia Solidaria/SETRES
                    </td>
                    <td style="width: 540px;" class="titulo-rel">
                        RELATÓRIO GERAL
                    </td>
                </tr>
            </table>
            <table style="width:1080px; border-collapse: collapse;">
                <tr>
                    <td rowspan="2" width="35px"  class="col-header-table">Id</td>
                    <td rowspan="2" width="250px" class="col-header-table" style="text-align:center">Município</td>
                    <td colspan="5" width="225px" class="col-header-table" style="text-align:center">Companhias</td>
                    <td rowspan="2" width="90px"  class="col-header-table" style="text-align:center">P. Coleta</td>
                    <td rowspan="2" width="100px" class="col-header-table" style="text-align:center">Bairros</td>
                    <td rowspan="2" width="80px"  class="col-header-table" style="text-align:center">Catadores</td>
                    <td colspan="2" width="100px" class="col-header-table" style="text-align:center">Sexo</td>
                    <td colspan="2" width="100px" class="col-header-table" style="text-align:center">Carteira Emitida</td>
                    <td rowspan="2" width="100px" class="col-header-table" style="text-align:center">Resíduos</td>
                </tr>
                <tr>
                    <td width="45px" class="col-header-table" style="text-align:center">Associação</td>
                    <td width="45px" class="col-header-table" style="text-align:center">Avulsa</td>
                    <td width="45px" class="col-header-table" style="text-align:center">Cooperativa</td>
                    <td width="45px" class="col-header-table" style="text-align:center">Informal</td>
                    <td width="45px" class="col-header-table" style="text-align:center">Indefinida</td>
                    <td width="50px" class="col-header-table" style="text-align:center">masc</td>
                    <td width="50px" class="col-header-table" style="text-align:center">fem</td>
                    <td width="50px" class="col-header-table" style="text-align:center">sim</td>
                    <td width="50px" class="col-header-table" style="text-align:center">não</td>
                </tr>
            </table>
        ');

        $mpdf->SetHTMLFooter('
            <table style="width:1080px; border-top: 1px solid #000000; font-size: 10px; font-family: Arial, Helvetica, sans-serif;">
                <tr>
                    <td width="360px">São Luis(MA) {DATE d/m/Y}</td>
                    <td width="360px" align="center"></td>
                    <td width="360px" align="right">{PAGENO}/{nbpg}</td>
                </tr>
            </table>
        ');




        $html = \View::make('admin.dashboard.pdf.pdfrelatoriomunicipiogeral', compact('municipios'));
        $html = $html->render();

        $stylesheet = file_get_contents('pdf/mpdf.css');
        $mpdf->WriteHTML($stylesheet, 1);

        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName, 'I');

        //return view('admin.residuo.pdf.pdfresiduogeral', compact('residuos'));
    }


    // Relatorio PDF Associados por Municipio
    public function relatoriomunicipioindividual($id)
    {
        $municipio = Municipio::find($id);

        $fileName = ('Municipio_individual.pdf');

        $mpdf = new \Mpdf\Mpdf([
            'orientation' => 'L',
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 32,
            'margin_bottom' => 15,
            'margin-header' => 10,
            'margin_footer' => 5
        ]);

        $mpdf->SetHTMLHeader('
            <table style="width:1080px; border-bottom: 1px solid #000000; margin-bottom: 3px;">
                <tr>
                    <td style="width: 108px">
                        <img src="images/logo-ma.png" width="80"/>
                    </td>
                    <td style="width: 432px; font-size: 10px; font-family: Arial, Helvetica, sans-serif;">
                        Governo do Estado do Maranhão<br>
                        Secretaria de Governo<br>
                        Secreatia Adjunta de Tecnologia da Informação/SEATI<br>
                        Secretaria do Trabalho e Economia Solidaria/SETRES
                    </td>
                    <td style="width: 540px;" class="titulo-rel">
                        RELATÓRIO INDIVIDUAL: '.$municipio->nome.'
                    </td>
                </tr>
            </table>
            <table style="width:1080px; border-collapse: collapse;">
                <tr>
                    <td width="50px" class="col-header-table">ID</td>
                    <td width="250px" class="col-header-table">NOME</td>
                    <td width="110px" class="col-header-table">RG</td>
                    <td width="90px" class="col-header-table">CPF</td>
                    <td width="180px" class="col-header-table">TELEFFONES</td>
                    <td width="200px" class="col-header-table">COMPANHIA / INSTITUIÇÃO</td>
                    <td width="200px" class="col-header-table">ÁREA DE ATUAÇÃO (MUNICÍPIO)</td>
                </tr>
            </table>
        ');

        $mpdf->SetHTMLFooter('
            <table style="width:1080px; border-top: 1px solid #000000; font-size: 10px; font-family: Arial, Helvetica, sans-serif;">
                <tr>
                    <td width="360px">São Luis(MA) {DATE d/m/Y}</td>
                    <td width="360px" align="center"></td>
                    <td width="360px" align="right">{PAGENO}/{nbpg}</td>
                </tr>
            </table>
        ');


        $html = \View::make('admin.municipio.pdf.pdfrelatoriomunicipioindividual', compact('municipio', 'mpdf'));
        $html = $html->render();

        $stylesheet = file_get_contents('pdf/mpdf.css');
        $mpdf->WriteHTML($stylesheet, 1);

        $mpdf->WriteHTML($html);
        //$mpdf->Output($fileName, 'D');  // Salva o relatório em um arquivo e força o download
        $mpdf->Output($fileName, 'I');  // Exibe o relatório diretamente no Browse

    }


}
