@extends('admin.layoutmaster')

@section('conteudo-principal')

    <div class="container">
        <h5>PONTO DE COLETA: {{$pontocoleta->nome}}</h5>
    </div>

    <div class="container">
    <form action="{{route('admin.pontocoleta.store')}}" method="POST" class="bg-light" style="padding: 10px; border:1px solid #000000">
        @csrf

        <div class="row">
            {{-- nome --}}
            <div class="col-12">
                <div class="form-group">
                    <label for="nome" class="col-form-label"><strong>Nome</strong></label>
                    <input class="form-control" name="nome" type="text" value="{{$pontocoleta->nome}}" id="nome" readonly>
                </div>
                @error('nome')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>
        </div>

        <div class="row">
            {{-- endereco --}}
            <div class="col-7">
                <div class="form-group">
                    <label for="endereco" class="col-form-label"><strong>Rua; Av; Trav; etc...</strong></label>
                    <input class="form-control" name="endereco" type="text" value="{{$pontocoleta->endereco}}" id="endereco" readonly>
                </div>
                @error('endereco')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>

            {{-- numero --}}
            <div class="col-1">
                <div class="form-group">
                    <label for="numero" class="col-form-label"><strong>Número</strong></label>
                    <input class="form-control" name="numero" type="text" value="{{$pontocoleta->numero}}" id="numero" readonly>
                </div>
            </div>

            {{-- bairro --}}
            <div class="col-4">
                <div class="form-group">
                    <label for="bairro" class="col-form-label"><strong>Bairro</strong></label>
                    <input class="form-control" name="bairro" type="text" value="{{$pontocoleta->bairro}}" id="bairro" readonly>
                </div>
                @error('bairro')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>
        </div>

        <div class="row">
            {{-- complemento --}}
            <div class="col-4">
                <div class="form-group">
                    <label for="complemento" class="col-form-label"><strong>Complemento</strong></label>
                    <input class="form-control" name="complemento" type="text" value="{{$pontocoleta->complemento}}" id="complemento" readonly>
                </div>
            </div>

            {{-- cidade --}}
            <div class="col-3">
                <div class="form-group">
                    <label for="cidade" class="col-form-label"><strong>Cidade</strong></label>
                    <input class="form-control" name="cidade" type="text" value="{{$pontocoleta->cidade}}" id="cidade" readonly>
                </div>
                @error('cidade')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>

            {{-- zona --}}
            <div class="col-5 align-self-end">
                <div class="form-group">
                    <label for="zona" class="col-form-label" style="margin-top: 5px"><strong>Zona</strong></label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="zona" id="zonaurbana" value="urbana" {{$pontocoleta->zona =="urbana" ? 'checked': ''}} disabled>
                        <label class="form-check-label" for="zonaurbana">Urbana</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="zona" id="zonarural" value="rural" {{$pontocoleta->zona =="rural" ? 'checked': ''}} disabled>
                        <label class="form-check-label" for="zonarural">Rural</label>
                    </div>
                </div>
                @error('zona')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>
        </div>

        <div style="text-align: right; margin-top: 10px; margin-bottom: 10px">
            <a class="btn btn-primary" href="{{route('admin.pontocoleta.index')}}" role="button">Retornar</a>
        </div>
      </form>
    </div>

@endsection
