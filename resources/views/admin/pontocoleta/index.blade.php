@extends('template.layoutmaster')

@section('conteudo-principal')

    <div class="container">
        <h2>Pontos de Coleta</h2>

        <a class="btn btn-primary" href="{{route('admin.pontocoleta.create')}}" role="button">
            <i class="fas fa-plus-circle"></i>
            Novo
        </a>


        @if(session('sucesso'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>OK!</strong> {{session('sucesso')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        @endif


    <table class="table">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Endereço</th>
            <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pontocoletas as $pontocoleta)
                <tr>
                    <th scope="row">{{$pontocoleta->id}}</th>
                    <td>{{$pontocoleta->nome}}</td>
                    <td>{{$pontocoleta->endereco.", ".$pontocoleta->numero.", ".$pontocoleta->id.", ".$pontocoleta->COMPLEMENTO.", ".$pontocoleta->cidade}}</td>
                    <td>
                        <a class="btn btn-warning" href="{{route('admin.pontocoleta.show', $pontocoleta->id)}}" role="button">
                            <i class="fas fa-eye"></i>
                        </a>

                        <a class="btn btn-primary" href="{{route('admin.pontocoleta.edit', $pontocoleta->id)}}" role="button">
                            <i class="fas fa-edit"></i>
                        </a>

                        <a class="btn btn-danger" data-toggle="modal" data-target="#formDelete{{$pontocoleta->id}}">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>

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


@endsection
