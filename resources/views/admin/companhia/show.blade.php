@extends('template.layoutmaster')

@section('conteudo-principal')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Gerenciar / Companhias / Exibir</h1>

    <div class="row">

        <div class="col-lg-12 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">  Companhias: {{$companhia->nome}}</h6>
                </div>

                <div class="card-body">

                    <form method="POST" action="" autocomplete="off">

                        <div class="pl-lg-4">
                            <div class="row">
                                {{-- nome --}}
                                <div class="col-lg-7">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="nome">Nome</label>
                                        <input type="text" id="nome" class="form-control" name="nome" placeholder="Name" value="{{$companhia->nome}}" readonly>
                                    </div>
                                </div>

                                {{-- cnpj --}}
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="cnpj">CNPJ</label>
                                        <input type="text" id="cnpj" class="form-control" name="cnpj" placeholder="Name" value="{{$companhia->cnpj}}" readonly>
                                    </div>
                                </div>

                                {{-- fundacao --}}
                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="fundacao">Fundação</label>
                                        <input type="date" id="fundacao" class="form-control" name="fundacao" placeholder="Name" value="{{$companhia->fundacao}}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{-- foneum --}}
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="foneum">Telefone</label>
                                        <input type="text" id="foneum" class="form-control" name="foneum" placeholder="Name" value="{{$companhia->foneum}}" readonly>
                                    </div>
                                </div>

                                {{-- fonedois --}}
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="fonedois">Telefone (opcional)</label>
                                        <input type="text" id="fonedois" class="form-control" name="fonedois" placeholder="Name" value="{{$companhia->fonedois}}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{-- presidente --}}
                                <div class="col-lg-7">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="presidente">Presidente</label>
                                        <input type="text" id="presidente" class="form-control" name="presidente" placeholder="Name" value="{{$companhia->presidente}}" readonly>
                                    </div>
                                </div>

                                {{-- fonepresidente --}}
                                <div class="col-lg-5">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="fonepresidente">Telefone</label>
                                        <input type="text" id="fonepresidente" class="form-control" name="fonepresidente" placeholder="Name" value="{{$companhia->fonepresidente}}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{-- vicepresidente --}}
                                <div class="col-lg-7">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="vicepresidente">Vice-Presidente</label>
                                        <input type="text" id="vicepresidente" class="form-control" name="vicepresidente" placeholder="Name" value="{{$companhia->vicepresidente}}" readonly>
                                    </div>
                                </div>

                                {{-- fonevicepresidente --}}
                                <div class="col-lg-5">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="fonevicepresidente">Telefone</label>
                                        <input type="text" id="fonevicepresidente" class="form-control" name="fonevicepresidente" placeholder="Name" value="{{$companhia->fonevicepresidente}}" readonly>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <h5>Endereço</h5>

                            <div class="row">
                                {{-- endereco --}}
                                <div class="col-lg-7">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="endereco">Rua; Av; Travessa, etc...</label>
                                        <input type="text" id="endereco" class="form-control" name="endereco" placeholder="Name" value="{{$companhia->endereco}}" readonly>
                                    </div>
                                </div>

                                {{-- numero --}}
                                <div class="col-lg-1">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="numero">Número</label>
                                        <input type="text" id="numero" class="form-control" name="numero" placeholder="Name" value="{{$companhia->numero}}" readonly>
                                    </div>
                                </div>


                                {{-- bairro_id --}}
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="bairro_id">Bairro</label>
                                        <select name="bairro_id" id="bairro_id" class="form-control" disabled>
                                            <option value="" selected disabled>Escolha ...</option>
                                            @foreach($bairros  as $bairro)
                                                <option value="{{$bairro->id}}" {{old('bairro_id', $companhia->bairro_id) == $bairro->id ? 'selected' : ''}}>{{$bairro->nome}}</option>
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
                                        <input type="text" id="complemento" class="form-control" name="complemento" placeholder="Name" value="{{$companhia->complemento}}" readonly>
                                    </div>
                                </div>


                                {{-- municipio_id --}}
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="municipio_id">Município</label>
                                        <select name="municipio_id" id="municipio_id" class="form-control" disabled>
                                            <option value="" selected disabled>Escolha ...</option>
                                            @foreach($municipios  as $municipio)
                                                <option value="{{$municipio->id}}" {{old('municipio_id', $companhia->municipio_id) == $municipio->id ? 'selected' : ''}}>{{$municipio->nome}}</option>
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
                                            <input class="form-check-input" type="radio" name="zona" id="zonaurbana" {{$companhia->zona == 'urbana' ? 'checked' : ''}} disabled>
                                            <label class="form-check-label" for="zonarural">Urbana</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="zona" id="zonarural" {{$companhia->zona == 'rural' ? 'checked' : ''}} disabled>
                                            <label class="form-check-label" for="zonaurbana">Rural</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <hr>

                            <fieldset>
                                <legend>Resíduos com que Trabalha</legend>
                                    <div class="row">
                                        @foreach ($residuos as $residuo )
                                            <div class="col-lg-4">
                                                <div>
                                                    <input disabled type="checkbox" id="residuo_{{$residuo->id}}" name="residuos[]" value="{{$residuo->id}}"
                                                    @if(old('residuos'))
                                                        {{in_array($residuo->id, old('residuos')) ? 'checked' : ''}}
                                                    @else
                                                        {{$companhia->residuos->contains($residuo->id) ? 'checked' : ''}}
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
                                    <a class="btn btn-primary" href="{{route('admin.companhia.index')}}" role="button">
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
