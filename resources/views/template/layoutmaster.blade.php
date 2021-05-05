<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SETRES</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('template/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- inicio add marcio -->
        <link href="{{ URL::asset('template/css/style.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
         <!-- Bootstrap core JavaScript-->
         {{--
            A inclusão destes scripts causa um conflito entre o lancamento do modal do perfil/logout e a tradução
            livre do datatables no final de cada script. Por isso eles foram suprimidos e a tradução foi retirada
            do final de cada página index e colocada no final deste arquivo: layoutmaster.blade.php

            <script src="{{ URL::asset('template/vendor/jquery/jquery.min.js') }}"></script>
            <script src="{{ URL::asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        --}}
    <!-- fim add marcio -->

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.residuo.index')}}"  style="margin-top: 20px; margin-bottom: 20px ">
                <div class="sidebar-brand-text mx-3"><img src="{{asset('images/logo-ma.png')}}" width="100" /></div>
                <div class="sidebar-brand-text mx-3">SETRES</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Gerenciar</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="{{route('admin.residuo.index')}}">Residuos Sólidos</a>
                        <a class="collapse-item" href="{{route('admin.bairro.index')}}">Bairros</a>
                        <a class="collapse-item" href="{{route('admin.municipio.index')}}">Municipios</a>
                        <a class="collapse-item" href="{{route('admin.companhia.index')}}">Companhias</a>
                        <a class="collapse-item" href="{{route('admin.pontocoleta.index')}}">Pontos de Coleta</a>
                        <a class="collapse-item" href="{{route('admin.associado.index')}}">Associados</a>
                        @can('adm')<a class="collapse-item" href="{{route('admin.user.index')}}">Usuários</a>@endcan
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">

                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="{{asset('template/img/undraw_profile_1.svg')}}" alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="{{asset('template/img/undraw_profile_2.svg')}}"
                                            alt="">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="{{asset('template/img/undraw_profile_3.svg')}}"
                                            alt="">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{session('nameUsuarioLogado')}}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{asset('template/img/undraw_profile.svg')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#ModalPerfil">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Editar Perfil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- CONTEÚDO DINÂMICO -->
                    <!-- INICIO DO CONTEÚDO DINÂMICO -->

                        @yield('conteudo-principal')

                    <!-- FIM DO CONTEÚDO DINÂMICO -->
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SEGOV/SEATI <?= date('Y') ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pronto para sair?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione "Logout" abaixo se você estiver pronto para finalizar sua sessão.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="{{route('front.logout')}}">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!--  Modal Perfil-->
    <!--
        data-backdrop="static" data-keyboard="false" Faz com que a modal só seja fechada se clicar no botão 'x' ou 'cancelar'.
        Antes, a modal poderia ser fechada clicando-se fora da modal, ou seja, em qualquer parte da janela.
    -->
    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="ModalPerfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Perfil</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="dieSessionErrorPerfil();">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="row">
                    <div class="col-lg-12 order-lg-1">
                        <div class="card shadow mb-4">
                            <form id="form-perfil" method="POST" action="{{route('admin.user.updateprofile', Auth()->user()->id)}}">
                                @csrf
                                @method('PUT')

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label >Nome Completo</label>
                                                <input value="{{old('fullname', Auth()->user()->fullname)}}" type="text" class="form-control" id="fullname" name="fullname">
                                                @error('fullname')
                                                    <small style="color: red">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label >CPF</label>
                                                <input value="{{old('cpf', Auth()->user()->cpf)}}" type="text" class="form-control" id="cpf" name="cpf">
                                                @error('cpf')
                                                    <small style="color: red">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label >Telefone</label>
                                                <input value="{{old('telefone', Auth()->user()->telefone)}}" type="text" class="form-control fone" id="telefone" name="telefone">
                                                @error('telefone')
                                                    <small style="color: red">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label >Usuário</label>
                                                <input value="{{old('name', Auth()->user()->name)}}" type="text" class="form-control" id="name" name="name">
                                                @error('name')
                                                    <small style="color: red">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label >Email</label>
                                                <input value="{{old('email', Auth()->user()->email)}}" type="text" class="form-control" id="email" name="email">
                                                @error('email')
                                                    <small style="color: red">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label >Senha</label>
                                                <input value="" type="password" class="form-control" id="password" name="password">
                                                @error('password')
                                                    <small style="color: red">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label >Confirmar Senha</label>
                                                <input value="" type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                                @error('password_confirmation')
                                                    <small style="color: red">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="password_hidden" value="{{Auth()->user()->password}}">
                                    <input type="text" name="perfil" value="{{Auth()->user()->perfil}}" style="display: none">
                                    <input type="text" name="municipio_id" value="{{Auth()->user()->municipio_id}}" style="display: none">


                                    {{-- Exibe os erros se houver
                                    @foreach ($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                    --}}

                                </div>

                                <div class="modal-footer">
                                    <button type="button" id="btn-fechar" class="btn btn-secondary" data-dismiss="modal" onclick="dieSessionErrorPerfil();">Cancelar</button>
                                    <button type="submit" name="btn-salvar-perfil" id="btn-salvar-perfil" class="btn btn-primary">Salvar</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('template/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('template/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('template/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('template/js/demo/chart-pie-demo.js')}}"></script>

    <!-- inicio add marcio -->
        <!-- Page level plugins -->
        <script src="{{ URL::asset('template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ URL::asset('template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Este trecho de código se encontrava antes no final de cada página index.blade.php -->
        <script src="{{asset('template/js/my_scripts.js')}}"></script>
        <script type="text/javascript">
            /*
            $(document).ready(function () {
              $('#dataTable').dataTable({
                "ordering": false,
                language: {
                    "lengthMenu": "Mostrar _MENU_ registos",
                    "search": "Procurar:",
                    "info": "Mostrando os registros _START_ a _END_ num total de _TOTAL_",
                    "paginate": {
                        "first": "Primeiro",
                        "previous": "Anterior",
                        "next": "Seguinte",
                        "last": "Último"
                    },
                    "zeroRecords": "Não foram encontrados resultados",
                }
              })
            });
            */
        </script>

        <!-- Page level custom scripts -->
        <script src="{{ URL::asset('template/js/demo/datatables-demo.js') }}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
        <script src="{{ URL::asset('template/js/mascaras.js') }}"></script>




        @yield('scripts')
        <!-- Permite colocar os scripts diretamente no final da página baterfoto ao invés do arquvo my_script.js -->

    <!-- fim add marcio -->



        <!-- Se os campos da modal do perfil não estiverem preenchidos, exibe a modal novamente com o respectivos erros -->
        @if(Session::has('errorperfil'))
            <script>
                $("#ModalPerfil").modal({ show: true });
            </script>
        @endif


        <!--
            Esse script será executado, 'matando' session errorperfil se o usuário resolver editar seu perfil, causar
            algum error (ou seja, esquecer de completar algum campo) e depois desistir, clicando no botão 'cancelar'
            ou no 'x' no canto superior direito da modal.
         -->
        <script>
            function dieSessionErrorPerfil(){
                alert('Seu perfil não será alterado!');
                {{ Session::forget('errorperfil')}}
            }
        </script>


</body>

</html>
