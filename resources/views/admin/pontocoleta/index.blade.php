@extends('template.layoutmaster')

@section('conteudo-principal')

        <h5><strong>PONTOS DE COLETA</strong></h5>

        <a class="btn btn-primary" href="{{route('admin.pontocoleta.create')}}" role="button" style="margin-bottom: 10px">
            <i class="fas fa-plus-circle"></i>
            Adicionar
        </a>

        <a class="btn btn-primary btn-danger" href="{{route('admin.pontocoleta.relatorio')}}" role="button" style="margin-bottom: 10px" target="_blank">
            <i class="far fa-file-pdf"></i>
            pdf
        </a>

        <a class="btn btn-primary btn-success" href="{{route('admin.pontocoleta.relatorioexcel')}}" role="button" style="margin-bottom: 10px">
            <i class="far fa-file-excel"></i>
            xlsx
        </a>

        <a class="btn btn-primary btn-warning" href="{{route('admin.pontocoleta.relatoriocsv')}}" role="button" style="margin-bottom: 10px">
            <i class="fas fa-file-csv"></i>
            csv
        </a>


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
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nome</th>
              <th>Endereço</th>
              <th>Ações</th>
            </tr>
          </thead>

          <tbody>
          @foreach($pontocoletas as $pontocoleta)
             <tr>
                <td>{{$pontocoleta->id}}</td>
                <td>{{$pontocoleta->nome}}</td>
                <td>{{$pontocoleta->endereco.", ".$pontocoleta->numero.", ".$pontocoleta->id.", ".$pontocoleta->COMPLEMENTO.", ".$pontocoleta->cidade}}</td>
                <td>
                    <a href="{{route('admin.pontocoleta.show', $pontocoleta->id)}}" title="exibir"><i class="fas fa-eye text-warning mr-2"></i></a>
                    <a href="{{route('admin.pontocoleta.edit', $pontocoleta->id)}}" title="editar"><i class="fas fa-edit text-info mr-2"></i></a>
                    <a href="" data-toggle="modal" data-target="#formDelete{{$pontocoleta->id}}" title="excluir"><i class="fas fa-trash text-danger mr-2"></i></a>

                    <!-- MODAL FormDelete OBS: O id da modal para cada registro tem que ser diferente, senão ele pega apenas o primeiro registro-->
                    <div class="modal fade" id="formDelete{{$pontocoleta->id}}" tabindex="-1" aria-labelledby="formDeleteLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="formDeleteLabel"><strong>Deletar Ponto de Coleta</strong></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <h5>{{$pontocoleta->nome}}</h5>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                            <form action="{{route('admin.pontocoleta.destroy', $pontocoleta->id)}}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" role="button"> Confirmar</button>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
          </tbody>
      </table>
    </div>
    </div>
    </div>

    <script type="text/javascript">
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
            }
          })
        });
    </script>
@endsection
