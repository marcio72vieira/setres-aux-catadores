@extends('template.layoutmaster')

@section('conteudo-principal')

    <div class="mb-4 d-sm-flex align-items-center justify-content-between">
        <h1 class="mb-0 text-gray-800 h3">
            Dashboard
            <a href="{{route('admin.dashboard.relatoriodashboard', 0)}}" role="button" target="_blank" style="font-size: 15px; color: red" title="Relatório Geral" alt="Relatório Geral"><i class="far fa-file-pdf"  style="font-size: 22px; color: gray"></i></a>
        </h1>
        <label id="ocultarExibirPaineldeCards" style="cursor: pointer; font-size: 17px;"><i id="iconeVisao" class="fas fa-eye-slash" style=" margin-right: 5px;"></i>ocultar</label>
    </div>

        <!-- INICIO Content Row CARDS-->
        <div class="row" id="paineldeCards">

            <!-- Municípios -->
            <div class="mb-4 col-xl-2 col-md-6">
                <div class="py-2 shadow card border-left-primary h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="mr-2 col">
                                <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">Municípios</div>
                                <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $qtdMunicipios }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-globe-americas fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bairros -->
            <div class="mb-4 col-xl-2 col-md-6">
                <div class="py-2 shadow card border-left-primary h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="mr-2 col">
                                <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">Bairros</div>
                                <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $qtdBairros }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-map-marked-alt fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pontos de Coleta -->
            <div class="mb-4 col-xl-2 col-md-6">
                <div class="py-2 shadow card border-left-primary h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="mr-2 col">
                                <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">Pontos de Coleta</div>
                                <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $qtdPontoColetas }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-building fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Resíduos -->
            <div class="mb-4 col-xl-2 col-md-6">
                <div class="py-2 shadow card border-left-primary h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="mr-2 col">
                                <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">Resíduos</div>
                                <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $qtdResiduos }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-recycle fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Masculino-->
            <div class="mb-4 col-xl-2 col-md-6">
                <div class="py-2 shadow card border-left-primary h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="mr-2 col">
                                <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">Catadores<br>Masculino</div>
                                <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $qtdAssMasc }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-male fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Feminino-->
            <div class="mb-4 col-xl-2 col-md-6">
                <div class="py-2 shadow card border-left-primary h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="mr-2 col">
                                <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">Catadores<br>Feminino</div>
                                <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $qtdAssFemi }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-female fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Carteiras Emitidas-->
            <div class="mb-4 col-xl-2 col-md-6">
                <div class="py-2 shadow card border-left-primary h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="mr-2 col">
                                <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">Carteiras<br>Emitidas</div>
                                <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $qtdComCarteira }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="far fa-id-card fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Carteiras não Emitidas-->
            <div class="mb-4 col-xl-2 col-md-6">
                <div class="py-2 shadow card border-left-primary h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="mr-2 col">
                                <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">Carteiras<br>não Emitidas</div>
                                <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $qtdSemCarteira }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-id-card fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Catadores Associados -->
            <div class="mb-4 col-xl-2 col-md-6">
                <div class="py-2 shadow card border-left-primary h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="mr-2 col">
                                <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">Catadores<br>Associados</div>
                                <div class="mb-0 h5 font-weight-bold text-black-800">{{ $qtdAssAssoc }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Catadores Cooperados -->
            <div class="mb-4 col-xl-2 col-md-6">
                <div class="py-2 shadow card border-left-primary h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="mr-2 col">
                                <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">Catadores<br>Cooperados</div>
                                <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $qtdAssCoop }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


             <!-- Catadores Avulsos -->
             <div class="mb-4 col-xl-2 col-md-6">
                <div class="py-2 shadow card border-left-primary h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="mr-2 col">
                                <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">Catadores<br>Avulsos</div>
                                <div class="mb-0 h5 font-weight-bold text-black-800">{{ $qtdAssAvul }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Catadores Informal -->
            <div class="mb-4 col-xl-2 col-md-6">
                <div class="py-2 shadow card border-left-primary h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="mr-2 col">
                                <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">Catadores<br>Informais</div>
                                <div class="mb-0 h5 font-weight-bold text-black-800">{{ $qtdAssInform}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Catadores Indefinidos -->
            @if($qtdAssIndef > 0)
                <div class="mb-4 col-xl-2 col-md-6">
                    <div class="py-2 shadow card border-left-danger h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="mr-2 col">
                                    <div class="mb-1 text-xs font-weight-bold text-danger text-uppercase">Catadores<br>Indefinidos</div>
                                    <div class="mb-0 h5 font-weight-bold text-danger-800" style="color: red">{{ $qtdAssIndef}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-danger-300" style="color: red"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif


             <!-- Associações -->
             <div class="mb-4 col-xl-2 col-md-6">
                <div class="py-2 shadow card border-left-primary h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="mr-2 col">
                                <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">Associações</div>
                                <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $qtdComphAssoc }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-city fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Cooperativas -->
            <div class="mb-4 col-xl-2 col-md-6">
                <div class="py-2 shadow card border-left-primary h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="mr-2 col">
                                <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">Cooperativas</div>
                                <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $qtdComphCoop }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-city fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grupos Avulsos -->
            <div class="mb-4 col-xl-2 col-md-6">
                <div class="py-2 shadow card border-left-primary h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="mr-2 col">
                                <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">Grupos Avulsos</div>
                                <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $qtdComphGrupAvuls }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-city fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grupos Informais -->
            <div class="mb-4 col-xl-2 col-md-6">
                <div class="py-2 shadow card border-left-primary h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="mr-2 col">
                                <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">Grupos Informais</div>
                                <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $qtdComphGrupInfom }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-city fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grupos Indefinidos -->
            @if($qtdComphGrupIndef > 0)
                <div class="mb-4 col-xl-2 col-md-6">
                    <div class="py-2 shadow card border-left-danger h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="mr-2 col">
                                    <div class="mb-1 text-xs font-weight-bold text-danger text-uppercase">Grupos Indefinidos</div>
                                    <div class="mb-0 h5 font-weight-bold text-danger-800"  style="color: red">{{ $qtdComphGrupIndef }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-city fa-2x text-black-300"  style="color: red"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
        <!-- FIM Content Row CARDS-->


        <!-- INÍCIO GRÁFICOS MONITOR MÊS A MÊS REGIONAL - MUNICIPIO - RESTAURANTE  -->
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="mb-4 shadow card">
                    <div class="pesquisaMonitor">
                        <div class="card-header ">
                            <div class="form-row">
                                <div class="col-md-3">
                                    <select id="selectMunicipio_id" class="form-control col-form-label-sm">
                                        <option value="0" selected disabled>Município...</option>
                                        @foreach ($municipios as $municipio )
                                            <option value="{{ $municipio->id }}">{{ $municipio->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{--
                        <div class="card-header"  style="float: right; margin-top: -51px; border-bottom: 1px solid #f8f9fc;">
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuDadosMesMesRestaurante"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration: none">
                                    <i class="text-gray-400 fas fa-ellipsis-v fa-sm fa-fw"></i>
                                </a>
                                <div class="psdmenu-mrc">
                                    <div class="shadow dropdown-menu dropdown-menu-right animated--fade-in"
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
                        --}}
                    </div>

                    <div class="card-body">
                        <div style="width: 100%; height: 80%; background-color: white;">

                            <!-- INICIO TABELA -->

                            <table id="dadosCompanhiasMunicipio" class="table table-sm table-bordered table-hover" style="color: #101d7e;">
                                <thead  class="bg-gray-100">
                                    <tr>
                                        <th colspan="8">Município: <span id="municipioSelecionado" style="font-weight: bold; font-size:20px;"></span></th>
                                        <th colspan="2"style="text-align: right">
                                            <a id="linkrelatoriopdfmunicipio" class="btn btn-sm" role="button" style="font-size: 20px; color: gray;"  title="Relatório Individual" alt="Relatório Individual"><i class="far fa-file-pdf"  style="font-size: 17px; color: gray"></i> pdf</a>
                                        </th>
                                    </tr>
                                    <tr>
                                        {{-- Se a consulta for mensal, exibe o label das semanas, se for semanal, exibe o label N/C, número da compra --}}
                                        <th rowspan="2" scope="col" style="width: 400px; text-align: center; vertical-align: middle">Companhias</th>
                                        <th rowspan="2" scope="col" style="width: 100px; text-align: center; vertical-align: middle">Tipo</th>
                                        <th rowspan="2" scope="col" style="width: 100px; text-align: center; vertical-align: middle">Nº Catadores</th>
                                        <th colspan="2" scope="col" style="width: 100px; text-align: center">Sexo</th>
                                        <th colspan="2" scope="col" style="width: 100px; text-align: center">Carteira Emitida</th>
                                        <th rowspan="2" scope="col" style="width: 100px; text-align: center; vertical-align: middle">Pontos de Coleta</th>
                                        <th colspan="2" scope="col" style="width: 400px; text-align: center; vertical-align: middle">Resíduos</th>
                                    </tr>
                                    <tr>
                                        {{-- Se a consulta for mensal, exibe o label das semanas, se for semanal, exibe o label N/C, número da compra --}}
                                        <th scope="col" style="width: 50px; text-align: center">Masculino</th>
                                        <th scope="col" style="width: 50px; text-align: center">Feminino</th>
                                        <th scope="col" style="width: 50px; text-align: center">Sim</th>
                                        <th scope="col" style="width: 50px; text-align: center">Não</th>
                                        <th scope="col" style="width: 60px; text-align: center">Qtd</th>
                                        <th scope="col" style="width: 320px; text-align: center">Descrição</th>
                                    </tr>
                                </thead>
                                <tbody id="dadosMunicipio">
                                    <tr>
                                        <td scope="col" style="width: 300px; text-align: left">&nbsp;</td>
                                        <td scope="col" style="width: 100px; text-align: center"></td>
                                        <td scope="col" style="width: 130px; text-align: center"></td>
                                        <td scope="col" style="width: 100px; text-align: center"></td>
                                        <td scope="col" style="width: 100px; text-align: center"></td>
                                        <td scope="col" style="width: 100px; text-align: center"></td>
                                        <td scope="col" style="width: 100px; text-align: center"></td>
                                        <td scope="col" style="width: 100px; text-align: center"></td>
                                        <td scope="col" style="width: 50px; text-align: left"></td>
                                        <td scope="col" style="width: 350px; text-align: left"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIM GRÁFICOS MONITOR MÊS A MÊS REGIONAL - MUNICIPIO - RESTAURANTE -->
@endsection

@section('scripts')
    <script>
        // Esconde/Exibe os cards para ampliar área de visualização
        $("#ocultarExibirPaineldeCards").click(function(){
            if($(this).text() == "ocultar"){
                //$(this).text("Exibir");
                $("#ocultarExibirPaineldeCards").html("<i id='iconeVisao' class='fas fa-eye' style='margin-right: 5px;'></i>exibir");
            }else {
                //$(this).text("Ocultar");
                $("#ocultarExibirPaineldeCards").html("<i id='iconeVisao' class='fas fa-eye-slash' style='margin-right: 5px;'></i>ocultar");
            }

            $("#paineldeCards").toggle();
            //$("#iconeVisao", this).toggleClass("fas fa-eye-slash fas fa-eye");
        });




        //Recuperação dinâmica das Companhias do Município escolhido
        $('#selectMunicipio_id').on('change', function() {

            // Recupera o valor do campo select
            var municipio_id = this.value;

            /*
            // Define a rota (URL) para o atributo href do link (linkrelatoriopdfmunicipio)
            // A rota não é para uma requisição NORMAL
            var route = "{{route('admin.dashboard.relatoriomunicipioindividual', 'id')}}";
                route = route.replace('id', municipio_id);
                $("#linkrelatoriopdfmunicipio").attr('href', route);
             */


            // Recupera o texto do option do campo select, selecionado
            // A rota é para uma requisição AJAX
            var nomeMunicipioSelecionado = $(this).children("option:selected").text();
            $("#municipioSelecionado").text(nomeMunicipioSelecionado);

            $.ajax({
                url:"{{route('admin.ajaxgetCompanhiasMunicipio')}}",
                type: "GET",
                data: {
                    idMunicipio: municipio_id
                },
                dataType : 'json',

                success: function(result){
                    $("#dadosMunicipio").html('');

                    let totCompanhias = 0;
                    let totCatadores = 0;
                    let totMasculinos = 0;
                    let totFemininos = 0;
                    let totComCarteiras = 0;
                    let totSemCarteiras = 0;
                    let totPontosColetas = 0;

                    let cadeiadeString = '';
                    let finalResiduosUnicos; '';
                    let arrNomesResiduos = '';
                    let arrStringResiduos = [];
                    let arrResiduosUnicos = [];
                    let totResiduosUnicos = 0;
                    let arrTiposCompanhias = [];


                    $.each(result.dados,function(key,value){

                        totCompanhias += value.companhia_total,
                        totCatadores  += value.companhia_totalcatadores;
                        totMasculinos += value.companhia_totalmasc;
                        totFemininos += value.companhia_totalfeme;
                        totComCarteiras += value.companhia_totalcomcarteira;
                        totSemCarteiras += value.companhia_totalsemcarteira;
                        totPontosColetas += value.pontocoleta_total;


                        // Adiciona ao array "arrStringResiduos" cada string formada pelo conjunto de residuos que foi retornado
                        value.nomeResiduo != null ? arrStringResiduos.push(value.nomeResiduo) : ''; // OU arrStringResiduos.push(value.nomeResiduo);
                        arrTiposCompanhias.push(value.companhia_tipo);


                        // Exibindo os valores retornados em suas respectivas posições
                        $("#dadosMunicipio").append(`
                                <tr>
                                    <td scope="col" style="width: 300px; text-align: left">${value.companhia_nome}</td>
                                    <td scope="col" style="width: 100px; text-align: center">${value.companhia_tipo}</td>
                                    <td scope="col" style="width: 130px; text-align: center">${value.companhia_totalcatadores}</td>
                                    <td scope="col" style="width: 100px; text-align: center">${value.companhia_totalmasc}</td>
                                    <td scope="col" style="width: 100px; text-align: center">${value.companhia_totalfeme}</td>
                                    <td scope="col" style="width: 100px; text-align: center">${value.companhia_totalcomcarteira}</td>
                                    <td scope="col" style="width: 100px; text-align: center">${value.companhia_totalsemcarteira}</td>
                                    <td scope="col" style="width: 100px; text-align: center">${value.pontocoleta_total}</td>
                                    <td scope="col" style="width: 50px; text-align: center">${value.residuo_total}</td>
                                    <td scope="col" style="width: 350px; text-align: left">${value.nomeResiduo == null ? '': value.nomeResiduo}</td>
                                </tr>
                        `);
                    });

                    // Transformando/Concatenando os elementos do array "arrStringResiduos" em uma única string, separada por ", "
                    arrStringResiduosElementos =  arrStringResiduos.join(", ");

                    // Transformando a string "arrStringResiduosElementos" em elementos de uma array, separados por ", "
                    arrNomesResiduos = arrStringResiduosElementos.split(', ');

                    // Gerando um novo array só com elementos únicos com o método "Set"
                    arrResiduosUnicos = Array.from(new Set(arrNomesResiduos));
                    totResiduosUnicos = arrResiduosUnicos.length;

                    arrTipoUnicos = Array.from(new Set(arrTiposCompanhias));
                    totTiposUnicos = arrTipoUnicos.length;

                    // Transformando novamente os elementos do array em uma string única, separada por ", "
                    finalResiduosUnicos = arrResiduosUnicos.join(", ");


                    $("#dadosMunicipio").append(`
                                <tr style="background-color: #e3e6f0; font-weight: bold; font-size:17px;">
                                    <td scope="col" style="width: 300px; text-align: center">${totCompanhias}</td>
                                    <td scope="col" style="width: 100px; text-align: center">${totTiposUnicos}</td>
                                    <td scope="col" style="width: 130px; text-align: center">${totCatadores}</td>
                                    <td scope="col" style="width: 100px; text-align: center">${totMasculinos}</td>
                                    <td scope="col" style="width: 100px; text-align: center">${totFemininos}</td>
                                    <td scope="col" style="width: 100px; text-align: center">${totComCarteiras}</td>
                                    <td scope="col" style="width: 100px; text-align: center">${totSemCarteiras}</td>
                                    <td scope="col" style="width: 100px; text-align: center">${totPontosColetas}</td>
                                    <td scope="col" style="width: 50px; text-align: center">${finalResiduosUnicos == "" ? 0 : totResiduosUnicos}</td>
                                    <td scope="col" style="width: 350px; text-align: left">${finalResiduosUnicos}</td>
                                </tr>
                        `);

                    // Define a rota (URL) para o atributo href do link (linkrelatoriopdfmunicipio)
                    // A rota É para uma requisição NORMAL
                    var route = "{{route('admin.dashboard.relatoriomunicipioindividual', 'id')}}";
                        route = route.replace('id', municipio_id);
                        if(totCompanhias > 0){
                            $("#linkrelatoriopdfmunicipio").attr('href', route);
                            $("#linkrelatoriopdfmunicipio").attr('target', '_blank');
                        } else {
                            $("#linkrelatoriopdfmunicipio").attr('href', '#');
                            $("#linkrelatoriopdfmunicipio").attr('target', '_self');
                        }

                },
                error: function(result){
                    alert("Error ao retornar dados!");
                }
            });
        });
    </script>
@endsection
