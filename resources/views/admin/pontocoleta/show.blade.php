@extends('template.layoutmaster')

@section('conteudo-principal')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Gerenciar / Pontos de Coleta / Exibir</h1>

    <div class="row">

        <div class="col-lg-12 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Pontos de Coleta: {{$pontocoleta->nome}}<br>
                    </h6>
                </div>

                <div class="card-body">

                    <form method="POST" action="" autocomplete="off">
                        @csrf

                        <div class="pl-lg-4">

                            <div class="row">
                                {{-- companhia_id --}}
                                <div class="col-lg-7">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="companhia_id">Companhia / Associação</label>
                                        <select name="companhia_id" id="companhia_id" class="form-control" disabled>
                                            <option value="" selected disabled>Escolha...</option>
                                            @foreach($companhias  as $companhia)
                                                <option value="{{$companhia->id}}" {{old('companhia_id', $pontocoleta->companhia_id) == $companhia->id ? 'selected' : ''}}>{{$companhia->nome}}</option>
                                            @endforeach
                                        </select>
                                        @error('companhia_id')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- nome --}}
                                <div class="col-lg-5">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="nome">Nome</label>
                                        <input type="text" id="nome" class="form-control" name="nome" value="{{$pontocoleta->nome}}" readonly>
                                        @error('nome')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{-- endereco --}}
                                <div class="col-lg-7">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="endereco">Rua; Av; Travessa, etc...</label>
                                        <input type="text" id="endereco" class="form-control" name="endereco" value="{{$pontocoleta->endereco}}" readonly>
                                        @error('endereco')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- numero --}}
                                <div class="col-lg-1">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="numero">Número</label>
                                        <input type="text" id="numero" class="form-control" name="numero" value="{{$pontocoleta->numero}}" readonly>
                                    </div>
                                </div>

                                {{-- bairro
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="bairro">Bairro</label>
                                        <input type="text" id="bairro" class="form-control" name="bairro" value="{{$pontocoleta->bairro}}" readonly>
                                    </div>
                                </div>
                                --}}

                                {{-- bairro_id --}}
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="bairro_id">Bairro</label>
                                        <select name="bairro_id" id="bairro_id" class="form-control" disabled>
                                            <option value="" selected disabled>Escolha ...</option>
                                            @foreach($bairros  as $bairro)
                                                <option value="{{$bairro->id}}" {{old('bairro_id', $pontocoleta->bairro_id) == $bairro->id ? 'selected' : ''}}>{{$bairro->nome}}</option>
                                            @endforeach
                                        </select>
                                        @error('bairro_id')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{-- complemento --}}
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="complemento">Complemento</label>
                                        <input type="text" id="complemento" class="form-control" name="complemento" value="{{$pontocoleta->complemento}}" readonly>
                                    </div>
                                </div>

                                {{-- cidade
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="cidade">Cidade</label>
                                        <input type="text" id="cidade" class="form-control" name="cidade" value="{{$pontocoleta->cidade}}" readonly>
                                    </div>
                                </div>
                                --}}

                                {{-- municipio_id --}}
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="municipio_id">Cidade</label>
                                        <select name="municipio_id" id="municipio_id" class="form-control" disabled>
                                            <option value="" selected disabled>Escolha ...</option>
                                            @foreach($municipios  as $municipio)
                                                <option value="{{$municipio->id}}" {{old('municipio_id', $pontocoleta->municipio_id) == $municipio->id ? 'selected' : ''}}>{{$municipio->nome}}</option>
                                            @endforeach
                                        </select>
                                        @error('municipio_id')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- zona --}}
                                <div class="col-lg-5">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="zona" style="margin-top: 5px">Zona</label>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="zona" id="zonaurbana" value="urbana" {{$pontocoleta->zona == 'urbana' ? 'checked' : ''}} disabled>
                                            <label class="form-check-label" for="zonaurbana">Urbana</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="zona" id="zonarural" value="rural" {{$pontocoleta->zona == 'rural' ? 'checked' : ''}} disabled>
                                            <label class="form-check-label" for="zonarural">Rural</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <hr>

                            <fieldset>
                                <legend>Resíduos recolhidos</legend>
                                    <div class="row">
                                        @foreach ($residuos as $residuo )
                                            <div class="col-lg-4">
                                                <div>
                                                    <input disabled type="checkbox" id="residuo_{{$residuo->id}}" name="residuos[]" value="{{$residuo->id}}"
                                                    @if(old('residuos'))
                                                        {{in_array($residuo->id, old('residuos')) ? 'checked' : ''}}
                                                    @else
                                                        {{$pontocoleta->residuos->contains($residuo->id) ? 'checked' : ''}}
                                                    @endif
                                                    >
                                                    <label for="residuo_{{$residuo->id}}">{{$residuo->nome}}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                            </fieldset>

                        </div>

                        <br>

                        <!-- Button -->
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col text-center">
                                    <a class="btn btn-primary" href="{{route('admin.pontocoleta.index')}}" role="button">
                                        <i class="fas fa-undo-alt"></i>
                                        Retornar</a>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection
