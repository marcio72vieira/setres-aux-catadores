@extends('template.layoutmaster')

@section('conteudo-principal')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

        <!-- INICIO Content Row CARDS-->
        <div class="row">

            <!-- Municípios -->
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Municípios</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $qtdMunicipios }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-globe-americas fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bairros -->
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Bairros</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $qtdBairros }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-map-marked-alt fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pontos de Coleta -->
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pontos de Coleta</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $qtdPontoColetas }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-city fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Resíduos -->
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Resíduos</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $qtdResiduos }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-recycle fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Masculino-->
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Catadores<br>Masculino</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $qtdAssMasc }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-male fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Feminino-->
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Catadores<br>Feminino</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $qtdAssFemi }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-female fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Catadores Cooperados -->
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Catadores<br>Cooperados</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $qtdAssCoop }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users  fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Catadores Associados -->
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Catadores<br>Associados</div>
                                <div class="h5 mb-0 font-weight-bold text-black-800">500</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users  fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


             <!-- Catadores Avulsos -->
             <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Catadores<br>Avulsos</div>
                                <div class="h5 mb-0 font-weight-bold text-black-800">500</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users  fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Catadores Informal -->
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Catadores<br>Informais</div>
                                <div class="h5 mb-0 font-weight-bold text-black-800">500</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users  fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


             <!-- Associações -->
             <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Associações</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-building  fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Cooperativas -->
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Cooperativas</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-building  fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- FIM Content Row CARDS-->


        <!-- INÍCIO GRÁFICOS MONITOR MÊS A MÊS REGIONAL - MUNICIPIO - RESTAURANTE  -->
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="pesquisaMonitor">
                        <div class="card-header ">
                            <div class="form-row">
                                <div class="col-md-3">
                                    <select id="selectRegional_id" class="form-control col-form-label-sm">
                                        <option value="0" selected>Município...</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <select id="selectMunicipio_id" class="form-control col-form-label-sm">
                                        <option value="0" selected>Companhia...</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <select id="selectRestaurante_id" class="form-control col-form-label-sm">
                                        <option  value="0" selected>Restaurante...</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="card-header"  style="float: right; margin-top: -51px; border-bottom: 1px solid #f8f9fc;">
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuDadosMesMesRestaurante"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration: none">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="psdmenu-mrc">
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuDadosMesMes">
                                        <a class="dropdown-item psdlink entidademesamesmonitor" data-entidademesamesmonitor="Geral"  data-id="0">Geral</a>

                                        <div class="dropdown-divider"></div>
                                        <div class="dropdown-header"><i class="fas fa-cubes"></i> Categorias:</div>
                                        <div style="clear: both"></div>

                                        <div class="dropdown-divider"></div>
                                        <div class="dropdown-header"><i class="fas fa-cubes"></i> Produtos:</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div style="width: 100%; height: 80%; background-color: white;">
                            <div id="areaparagraficosmesamesmonitor">
                                <canvas id="graficomesamesMonitor" width="200" height="40" style="padding: 10px 5px 5px 5px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIM GRÁFICOS MONITOR MÊS A MÊS REGIONAL - MUNICIPIO - RESTAURANTE -->


@endsection
