@extends('template.layoutmaster')

@section('conteudo-principal')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Gerenciar / Companhias / Cadastrar</h1>

    <div class="row">

        <div class="col-lg-12 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <span class="small text-secondary">Campo marcado com * é de preenchimento obrigatório!</span>
                    </h6>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{route('admin.companhia.store')}}" autocomplete="off">
                        @csrf

                        <div class="pl-lg-4">
                            <div class="row">
                                {{-- nome --}}
                                <div class="col-lg-7">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="nome">Nome<span class="small text-danger">*</span></label>
                                        <input type="text" id="nome" class="form-control" name="nome" value="{{old('nome')}}" required>
                                        @error('nome')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- cnpj --}}
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="cnpj">CNPJ<span class="small text-danger">*</span></label>
                                        <input type="text" id="cnpj" class="form-control" name="cnpj" value="{{old('cnpj')}}" required>
                                        @error('cnpj')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- fundacao --}}
                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="fundacao">Fundação<span class="small text-danger">*</span></label>
                                        <input type="date" id="fundacao" class="form-control" name="fundacao" value="{{old('fundacao')}}" required>
                                        @error('fundacao')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{-- foneum --}}
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="foneum">Telefone<span class="small text-danger">*</span></label>
                                        <input type="text" id="foneum" class="form-control phone" name="foneum" placeholder="(99) 9999-9999" value="{{old('foneum')}}" required>
                                        @error('foneum')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- fonedois --}}
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="fonedois">Telefone (opcional)</label>
                                        <input type="text" id="fonedois" class="form-control phone" name="fonedois" placeholder="(99) 9999-9999" value="{{old('fonedois')}}">
                                        @error('fonedois')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- tipo --}}
                                <div class="col-lg-5">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="tipo">Tipo<span class="small text-danger">*</span></label>
                                        <select name="tipo" id="tipo" class="form-control" required>
                                            <option value="" selected disabled>Escolha ...</option>
                                            <option value="associacao" {{old('tipo') == 'associacao' ? 'selected' : ''}}>Associção</option>
                                            <option value="cooperativa" {{old('tipo') == 'cooperativa' ? 'selected' : ''}}>Cooperativa</option>
                                            <option value="grupoavulso" {{old('tipo') == 'grupoavulso' ? 'selected' : ''}}>Grupo Avulso</option>
                                            <option value="grupoinformal" {{old('tipo') == 'grupoinformal' ? 'selected' : ''}}>Grupo Informal</option>
                                            <option value="indefinido" {{old('tipo') == 'indefinido' ? 'selected' : ''}}>Indefinido</option>
                                        </select>
                                        @error('tipo')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{-- presidente --}}
                                <div class="col-lg-7">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="presidente">Presidente<span class="small text-danger">*</span></label>
                                        <input type="text" id="presidente" class="form-control" name="presidente" value="{{old('presidente')}}" required>
                                        @error('presidente')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- fonepresidente --}}
                                <div class="col-lg-5">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="fonepresidente">Telefone<span class="small text-danger">*</span></label>
                                        <input type="text" id="fonepresidente" class="form-control phone" name="fonepresidente" placeholder="(99) 9999-9999" value="{{old('fonepresidente')}}" required>
                                        @error('fonepresidente')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{-- vicepresidente --}}
                                <div class="col-lg-7">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="vicepresidente">Vice-Presidente<span class="small text-danger">*</span></label>
                                        <input type="text" id="vicepresidente" class="form-control" name="vicepresidente" value="{{old('vicepresidente')}}" required>
                                        @error('vicepresidente')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- fonevicepresidente --}}
                                <div class="col-lg-5">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="fonevicepresidente">Telefone<span class="small text-danger">*</span></label>
                                        <input type="text" id="fonevicepresidente" class="form-control phone" name="fonevicepresidente" placeholder="(99) 9999-9999" value="{{old('fonevicepresidente')}}" required>
                                        @error('fonevicepresidente')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <h5>Endereço</h5>

                            <div class="row">
                                {{-- endereco --}}
                                <div class="col-lg-7">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="endereco">Rua; Av; Travessa, etc...<span class="small text-danger">*</span></label>
                                        <input type="text" id="endereco" class="form-control" name="endereco" value="{{old('endereco')}}" required>
                                        @error('endereco')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- numero --}}
                                <div class="col-lg-1">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="numero">Número<span class="small text-danger">*</span></label>
                                        <input type="text" id="numero" class="form-control" name="numero" value="{{old('numero')}}">
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
                                                <option value="{{$bairro->id}}" {{old('bairro_id') == $bairro->id ? 'selected' : ''}}>{{$bairro->nome}}</option>
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
                                        <input type="text" id="complemento" class="form-control" name="complemento" value="{{old('complemento')}}">
                                        @error('complemento')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>


                                {{-- municipio_id --}}
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="municipio_id">Município<span class="small text-danger">*</span></label>
                                        <select name="municipio_id" id="municipio_id" class="form-control" required>
                                            <option value="" selected disabled>Escolha...</option>
                                            @foreach($municipios  as $municipio)
                                                <option value="{{$municipio->id}}" {{old('municipio_id') == $municipio->id ? 'selected' : ''}}>{{$municipio->nome}}</option>
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
                                            <input class="form-check-input" type="radio" name="zona" id="zonaurbana" value="urbana" {{old('zona') == 'urbana' ? 'checked' : ''}} required>
                                            <label class="form-check-label" for="zonaurbana">Urbana</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="zona" id="zonarural" value="rural" {{old('zona') == 'rural' ? 'checked' : ''}} required>
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
                                <legend>Resíduos com que Trabalha</legend>
                                    <div class="row">
                                        @foreach ($residuos as $residuo )
                                            <div class="col-lg-4">
                                                <div>
                                                    <input type="checkbox" id="residuo_{{$residuo->id}}" name="residuos[]" value="{{$residuo->id}}"
                                                    @if(old('residuos'))
                                                        {{in_array($residuo->id, old('residuos')) ? 'checked' : ''}}
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
                                    <a class="btn btn-primary" href="{{route('admin.companhia.index')}}" role="button">Cancelar</a>
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
