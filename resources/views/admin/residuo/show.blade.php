@extends('admin.layoutmaster')

@section('conteudo-principal')

    <div class="container">
        <h2>RESÍDUOS SÓLIDOS</h2>

        <br><br>
        <form action="" method="">
            @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">Resíduo</label>
                <input type="text" class="form-control" id="name" name="nome" value="{{$residuo->nome}}" readonly>
                @error('name')
                    <small style="color: red">{{$message}}</small>
                @enderror
              </div>

              <br><br><br>
              <a class="btn btn-primary" href="{{route('admin.residuo.index')}}" role="button">Retornar</a>

        </form>


    </div>

@endsection
