<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard;
use Illuminate\Http\Request;

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


        return view('admin.dashboard.index', compact('qtdMunicipios', 'qtdBairros', 'qtdPontoColetas', 'qtdResiduos', 'qtdAssMasc', 'qtdAssFemi', 'qtdAssCoop'));
    }

}
