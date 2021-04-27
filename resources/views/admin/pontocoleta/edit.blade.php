@extends('template.layoutmaster')

@section('conteudo-principal')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Gerenciar / Pontos de Coleta / Editar</h1>

    <div class="row">

        <div class="col-lg-12 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        {{$pontocoleta->nome}}<br>
                        <span class="small text-secondary">Campo marcado com * é de preenchimento obrigatório!</span>
                    </h6>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{route('admin.pontocoleta.update', $pontocoleta->id)}}" autocomplete="off">
                        @csrf
                        @method('PUT')

                        <div class="pl-lg-4">
                            <div class="row">
                                {{-- companhia_id --}}
                                <div class="col-lg-7">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="companhia_id">Companhia / Associação<span class="small text-danger">*</span></label>
                                        <select name="companhia_id" id="companhia_id" class="form-control" required>
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
                                        <label class="form-control-label" for="nome">Nome<span class="small text-danger">*</span></label>
                                        <input type="text" id="nome" class="form-control" name="nome" value="{{old('nome', $pontocoleta->nome)}}" required>
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
                                        <label class="form-control-label" for="endereco">Rua; Av; Travessa, etc...<span class="small text-danger">*</span></label>
                                        <input type="text" id="endereco" class="form-control" name="endereco" value="{{old('endereco', $pontocoleta->endereco)}}" required>
                                        @error('endereco')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- numero --}}
                                <div class="col-lg-1">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="numero">Número<span class="small text-danger">*</span></label>
                                        <input type="text" id="numero" class="form-control" name="numero" value="{{old('numero', $pontocoleta->numero)}}">
                                        @error('numero')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- bairro_id --}}
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="bairro_id">Bairro<span class="small text-danger">*</span></label>
                                        <select name="bairro_id" id="bairro_id" class="form-control" required>
                                            <option value="" selected disabled>Escolha...</option>
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
                                        <input type="text" id="complemento" class="form-control" name="complemento" value="{{old('complemento', $pontocoleta->complemento)}}">
                                        @error('complemento')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- municipio_id --}}
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="municipio_id">Município<span class="small text-danger">*</span></label>
                                        <select name="municipio_id" id="municipio_id" class="form-control" required>
                                            <option value="" selected disabled>Escolha...</option>
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
                                        <label class="form-control-label" for="zona" style="margin-top: 5px">Zona<span class="small text-danger">*</span></label>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="zona" id="zonaurbana" value="urbana" {{old('zona', $pontocoleta->zona) == 'urbana' ? 'checked' : ''}} required>
                                            <label class="form-check-label" for="zonaurbana">Urbana</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="zona" id="zonarural" value="rural" {{old('zona', $pontocoleta->zona) == 'rural' ? 'checked' : ''}} required>
                                            <label class="form-check-label" for="zonarural">Rural</label>
                                        </div>
                                        @error('zona')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
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
                                                    <input type="checkbox" id="residuo_{{$residuo->id}}" name="residuos[]" value="{{$residuo->id}}"
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
                                    <a class="btn btn-primary" href="{{route('admin.pontocoleta.index')}}" role="button">Cancelar</a>
                                    <button type="submit" class="btn btn-primary" style="width: 95px;"> Salvar </button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection
