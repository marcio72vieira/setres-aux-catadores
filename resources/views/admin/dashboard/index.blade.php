@extends('template.layoutmaster')

@section('conteudo-principal')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <label id="ocultarExibirPaineldeCards" style="cursor: pointer; font-size: 17px;"><i id="iconeVisao" class="fas fa-eye-slash" style=" margin-right: 5px;"></i>ocultar</label>
    </div>

        <!-- INICIO Content Row CARDS-->
        <div class="row" id="paineldeCards">

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
                                <i class="fas fa-building  fa-2x text-black-300"></i>
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

            <!-- Catadores Associados -->
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Catadores<br>Associados</div>
                                <div class="h5 mb-0 font-weight-bold text-black-800">{{ $qtdAssAssoc }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users  fa-2x text-black-300"></i>
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


             <!-- Catadores Avulsos -->
             <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Catadores<br>Avulsos</div>
                                <div class="h5 mb-0 font-weight-bold text-black-800">{{ $qtdAssAvul }}</div>
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
                                <div class="h5 mb-0 font-weight-bold text-black-800">{{ $qtdAssInform}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users  fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Catadores Indefinidos -->
            @if($qtdAssIndef > 0)
                <div class="col-xl-2 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Catadores<br>Indefinidos</div>
                                    <div class="h5 mb-0 font-weight-bold text-danger-800" style="color: red">{{ $qtdAssIndef}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users  fa-2x text-danger-300" style="color: red"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif


             <!-- Associações -->
             <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Associações</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $qtdComphAssoc }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-city fa-2x text-black-300"></i>
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
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $qtdComphCoop }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-city fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grupos Avulsos -->
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Grupos Avulsos</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $qtdComphGrupAvuls }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-city fa-2x text-black-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grupos Informais -->
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Grupos Informais</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $qtdComphGrupInfom }}</div>
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
                <div class="col-xl-2 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Grupos Indefinidos</div>
                                    <div class="h5 mb-0 font-weight-bold text-danger-800"  style="color: red">{{ $qtdComphGrupIndef }}</div>
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
                <div class="card shadow mb-4">
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
                        --}}
                    </div>

                    <div class="card-body">
                        <div style="width: 100%; height: 80%; background-color: white;">

                            <!-- INICIO TABELA -->

                            <table id="dadosCompanhiasMunicipio" class="table table-sm table-bordered  table-hover">
                                <thead  class="bg-gray-100">
                                    <tr>
                                        <th colspan="8">Município: </th>
                                        <th colspan="2"style="text-align: right">
                                            <a class="btn btn-primary btn-danger btn-sm" href="" role="button" target="_blank"><i class="far fa-file-pdf"  style="font-size: 15px;"></i>pdf</a>
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

            var municipio_id = this.value;

            $.ajax({
                url:"{{route('admin.ajaxgetCompanhiasMunicipio')}}",
                type: "GET",
                data: {
                    idMunicipio: municipio_id
                },
                dataType : 'json',

                success: function(result){
                    $("#dadosMunicipio").html('');

                    let totCat = 0;
                    let totMasc = 0;
                    let totFeme = 0;
                    let totComCart = 0;
                    let totSemCart = 0;
                    let totPColet = 0;

                    $.each(result.dados,function(key,value){

                        totCat  += value.companhia_totalcatadores;
                        totMasc += value.companhia_totalmasc;
                        totFeme += value.companhia_totalfeme;
                        totComCart += value.companhia_totalcomcarteira;
                        totSemCart += value.companhia_totalsemcarteira;
                        totPColet += value.pontocoleta_total;


                        //$("#selectMunicipio_id").append('<option value="'+value.id+'">'+value.nome+'</option>');
                        console.log(result);
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
                                    <td scope="col" style="width: 350px; text-align: left">${value.nomeResiduo}</td>
                                </tr>
                        `);
                    });


                    $("#dadosMunicipio").append(`
                                <tr style="background-color: #e3e6f0;">
                                    <td scope="col" style="width: 300px; text-align: left">&nbsp;</td>
                                    <td scope="col" style="width: 100px; text-align: center"></td>
                                    <td scope="col" style="width: 130px; text-align: center">${totCat}</td>
                                    <td scope="col" style="width: 100px; text-align: center">${totMasc}</td>
                                    <td scope="col" style="width: 100px; text-align: center">${totFeme}</td>
                                    <td scope="col" style="width: 100px; text-align: center">${totComCart}</td>
                                    <td scope="col" style="width: 100px; text-align: center">${totSemCart}</td>
                                    <td scope="col" style="width: 100px; text-align: center">${totPColet}</td>
                                    <td scope="col" style="width: 50px; text-align: center"></td>
                                    <td scope="col" style="width: 350px; text-align: left"></td>
                                </tr>
                        `);
                },
                error: function(result){
                    alert("Error ao retornar dados!");
                }
            });
        });
    </script>
@endsection
