@extends('template.layoutmaster')

@section('conteudo-principal')

    <!-- Begin Page Content -->
<div class="container-fluid">

    <h5><strong>ASSOCIADOS</strong></h5>

    <a class="btn btn-primary" href="{{route('admin.associado.create')}}" role="button" style="margin-bottom: 10px">
        <i class="fas fa-plus-circle"></i>
        Adicionar
    </a>

    {{--
    <a class="btn btn-primary btn-danger" href="{{route('admin.associado.relatorio')}}" role="button" style="margin-bottom: 10px" target="_blank">
        <i class="far fa-file-pdf"></i>
        pdf
    </a>
    --}}

    {{--
    <a class="btn btn-primary btn-success" href="{{route('admin.associado.relatorioexcel')}}" role="button" style="margin-bottom: 10px">
        <i class="far fa-file-excel"></i>
        xlsx
    </a>

    <a class="btn btn-primary btn-warning" href="{{route('admin.associado.relatoriocsv')}}" role="button" style="margin-bottom: 10px">
            <i class="fas fa-file-csv"></i>
            csv
    </a>
    --}}

    @can('adm')
        <a class="btn btn-primary btn-danger" href="{{route('admin.associado.zipdownload')}}" role="button" style="margin-bottom: 10px" title="baixar pasta de fotos">
            <i class="fas  fa-download mr-2"></i>
            fotos
        </a>
        {{-- RELATÓRIO EXCEL E CSV A PARTIR DE UMA VIEW BLADE --}}
        <a class="btn btn-primary btn-success" href="{{route('admin.associado.relatorioexceldois')}}" role="button" style="margin-bottom: 10px"  title="baixar registros excel">
            <i class="far fa-file-excel"></i>
            xlsx
        </a>

        <a class="btn btn-primary btn-warning" href="{{route('admin.associado.relatoriocsvtable')}}" role="button" style="margin-bottom: 10px"   title="baixar registros csv">
            <i class="fas fa-file-csv"></i>
            csv
        </a>
    @endcan





    @if(session('sucesso'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>OK!</strong> {{session('sucesso')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
    @endif


    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableAssociado" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Telefone(s)</th>
                            <th>Tipo</th>
                            <th>Companhia</th>
                            <th>Áreas de atuação</th>
                            <th style="width: 165px;">Ação</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Telefone(s)</th>
                            <th>Tipo</th>
                            <th>Companhia</th>
                            <th>Áreas de atuação</th>
                            <th style="width: 165px;">Ação</th>
                        </tr>
                    </tfoot>
                </table>

                <!-- MODAL FormDelete OBS: O id da modal para cada registro tem que ser diferente, senão ele pega apenas o primeiro registro-->
                <div class="modal fade" id="formDelete" tabindex="-1" aria-labelledby="formDeleteLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="formDeleteLabel"><strong>Deletar Associado</strong></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <h5 id="h5nomeAssociado"></h5>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                <form id="formdelete" action="" method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" role="button"> Confirmar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){

            // DataTable
            $('#dataTableAssociado').DataTable({

                order: [[ 0, 'desc' ]],     // Exibe os registros em ordem decrescente pelo ID (coluna 0) (Regra de negócio: último registro cadastrado)
                columnDefs: [               // Impede que as colunas 2, 4, e  5 sejam ordenadas pelo usuário
                    { orderable: false, targets: [2, 4, 5] }
                ],
                //lengthMenu: [5, 10, 20, 50, 100, 200, 500], //Configura o número de entra de registro a serem exibido por pagina

                processing: true,
                serverSide: true,
                ajax: "{{route('admin.ajaxgetAssociados')}}", // Preenche a tabela automaticamente, a partir de uma requisição Ajax (pela rota nomeada)
                // Obs: O corpo da tabela com o dados e os ícones das ações (show, edit e delete), é construido no método "ajaxgetAssociados" do controller AssociadoController
                // Obs: Para fazer a ordenação, o nome das colunas abaixo, devem conincidir com o nome dos campos retornados pela query na recuperação dos registros desejados
                columns: [
                    { data: 'id' },
                    { data: 'nome' },
                    { data: 'telefones' },
                    { data: 'tipo' },
                    { data: 'companhia' },
                    { data: 'area' },
                    { data: 'actions'}
                ],
                language: {
                    "lengthMenu": "Mostrar _MENU_ registos",
                    "search": "Procurar:",
                    /*"info": "Mostrando os registros _START_ a _END_ num total de _TOTAL_",*/
                    /*"info": "Mostrando os registros de _START_ a _END_ num total de _MAX_",*/
                    "info": "Mostrando os registros de _START_ a _END_ num total de _TOTAL_",
                    "infoFiltered":   "(Filtrados _TOTAL_ de um total de _MAX_ registros)",
                    "paginate": {
                        "first": "Primeiro",
                        "previous": "Anterior",
                        "next": "Seguinte",
                        "last": "Último"
                    },
                    "zeroRecords": "Não foram encontrados resultados",
                },
                pagingType: "full_numbers", // Todos os links de paginação   "simple_numbers" // Sómente anterior; seguinte e os núemros da página:

            });

            // No script abaixo, uma função é disparada quando o usuário clicar exatamente [on('click', '.deleteassociado')] em cima do ícone
            // deletar (definido como um botão no controller: AssociadoController) cuja a classe está definida como ".deleteassociado".
            // Disparada esta função o id e o nome do associado são recuperados através dos dados armazenados nas propriedades
            // "data-idassociado" e "data-nomeassociado", do mesmo ícone de botão deletar também definido no controller AssociadoController.
            // A "route" é uma string completa que possui o nome da rota juntamente com o id do associado. Infelizmente não tem
            // como referenciar uma variável javascript em um script PHP(Laravel), por isso houve a necessidade de fazer esse junção
            // com o recurso de substituição: route = route.replace('id', idassociado);
            $('#dataTableAssociado').on('click', '.deleteassociado', function(event){
                var idAssociado = $(this).data('idassociado');
                var nomeAssociado = $(this).data('nomeassociado');
                var route = "{{route('admin.associado.destroy', 'id')}}";
                    route = route.replace('id', idAssociado);

                // alert($(this).data('idrestaurante')); // alert($(this).data('nomeAssociado')); // alert(route);

                $('#h5nomeAssociado').text(nomeAssociado);
                $('#formdelete').attr('action', route);
            });

         });
    </script>
@endsection
