@extends('admin.layoutmaster')

@section('conteudo-principal')

    <div class="container">
        <h2>BAIRRO</h2>

        <br><br>
        <form action="" method="">
            @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">Bairro</label>
                <input type="text" class="form-control" id="name" name="nome" value="{{$bairro->nome}}" readonly>
                @error('name')
                    <small style="color: red">{{$message}}</small>
                @enderror
              </div>

              <div style="text-align: right; margin-top: 10px; margin-bottom: 10px">
                <a class="btn btn-primary" href="{{route('admin.bairro.index')}}" role="button">Retornar</a>
            </div>

        </form>


    </div>

@endsection
