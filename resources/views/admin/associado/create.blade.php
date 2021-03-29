@extends('template.layoutmaster')

@section('conteudo-principal')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Gerenciar / Associado / Cadastrar</h1>

    <div class="row">

        <div class="col-lg-12 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <span class="small text-secondary">Campo marcado com * é de preenchimento obrigatório!</span>
                    </h6>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{route('admin.associado.store')}}" autocomplete="off">
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

                                {{-- nascimento --}}
                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="nascimento">Data de Nascimento<span class="small text-danger">*</span></label>
                                        <input type="date" id="nascimento" class="form-control" name="nascimento" value="{{old('nascimento')}}" required>
                                        @error('nascimento')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- sexo --}}
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="sexo">Sexo<span class="small text-danger">*</span></label>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sexo" id="sexom" value="m" {{old('sexo') == 'm' ? 'checked' : ''}} required>
                                            <label class="form-check-label" for="sexom">Masculino</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sexo" id="sexof" value="f" {{old('sexo') == 'f' ? 'checked' : ''}} required>
                                            <label class="form-check-label" for="sexof">Feminino</label>
                                        </div>
                                        @error('sexo')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{-- rg --}}
                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="rg">RG<span class="small text-danger">*</span></label>
                                        <input type="text" id="rg" class="form-control" name="rg" value="{{old('rg')}}" required>
                                        @error('rg')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- rgorgaoemissor --}}
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="rgorgaoemissor">Orgão Emissor</label>
                                        <input type="text" id="rgorgaoemissor" class="form-control" name="rgorgaoemissor" value="{{old('rgorgaoemissor')}}" required>
                                        @error('rgorgaoemissor')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- cpf --}}
                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="cpf">CPF<span class="small text-danger">*</span></label>
                                        <input type="text" id="cpf" class="form-control" name="cpf" value="{{old('cpf')}}" required>
                                        @error('cpf')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- racacor --}}
                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="racacor">Raça / Cor<span class="small text-danger">*</span></label>
                                        <select name="racacor" id="racacor" class="form-control" required>
                                            <option value="" selected disabled>Escolha ...</option>
                                            <option value="branca" {{old('racacor') == 'branca' ? 'selected' : ''}}>Branca</option>
                                            <option value="preta" {{old('racacor') == 'preta' ? 'selected' : ''}}>Preta</option>
                                            <option value="parda" {{old('racacor') == 'parda' ? 'selected' : ''}}>Parda</option>
                                            <option value="amarela" {{old('racacor') == 'amarela' ? 'selected' : ''}}>Amarela</option>
                                            <option value="indigena" {{old('racacor') == 'indigena' ? 'selected' : ''}}>Indígena</option>
                                        </select>
                                        @error('racacor')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- filiacao --}}
                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="filiacao">Data de filiacao<span class="small text-danger">*</span></label>
                                        <input type="date" id="filiacao" class="form-control" name="filiacao" value="{{old('filiacao')}}" required>
                                        @error('filiacao')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{-- companhia_id --}}
                                <div class="col-lg-7">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="companhia_id">Companhia / Associação<span class="small text-danger">*</span></label>
                                        <select name="companhia_id" id="companhia_id" class="form-control" required>
                                            <option value="" selected disabled>Escolha uma Companhia / Associação ...</option>
                                            @foreach($companhias  as $companhia)
                                                <option value="{{$companhia->id}}" {{old('companhia_id') == $companhia->id ? 'selected' : ''}}>{{$companhia->nome}}</option>
                                            @endforeach
                                        </select>
                                        @error('companhia_id')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- bairros --}}
                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="bairros">Área de Atuação<span class="small text-danger">*</span></label>
                                        <select name="bairros[]" id="bairros" class="form-control" multiple required>
                                            <option value="" disabled>Escolha o(s) Bairros...</option>
                                            @foreach($bairros  as $bairro)
                                                <option value="{{$bairro->id}}"
                                                    @if(old('bairros'))
                                                        {{in_array($bairro->id, old('bairros')) ? 'selected' : ''}}
                                                    @endif
                                                >{{$bairro->nome}}</option>
                                            @endforeach
                                        </select>
                                        @error('bairros')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- quantidade --}}
                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="quantidade">Qtd. média Coletada (Kg)<span class="small text-danger">*</span></label>
                                        <input type="number" id="quantidade" class="form-control" name="quantidade" value="{{old('quantidade')}}" required>
                                        @error('quantidade')
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

                                {{-- bairro --}}
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="bairro">Bairro<span class="small text-danger">*</span></label>
                                        <input type="text" id="bairro" class="form-control" name="bairro" value="{{old('bairro')}}" required>
                                        @error('bairro')
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

                                {{-- cidade --}}
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="cidade">Cidade<span class="small text-danger">*</span></label>
                                        <input type="text" id="cidade" class="form-control" name="cidade" value="{{old('cidade')}}" required>
                                        @error('cidade')
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

                            <div class="row">
                                {{-- foneum --}}
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="foneum">Telefone 1</label>
                                        <input type="text" id="foneum" class="form-control" name="foneum" placeholder="(99) 9999-9999" value="{{old('foneum')}}">
                                        @error('foneum')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- fonedois --}}
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="fonedois">Telefone 2 (opcional)</label>
                                        <input type="text" id="fonedois" class="form-control" name="fonedois"  placeholder="(99) 9999-9999" value="{{old('fonedois')}}" required>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- INICIO TIRAR FOTO -->
                        <fieldset>

                            <legend>Foto</legend>

                            <div class="row" style="padding: 10px; border: 1px solid #dcdcdc" >
                                <div class="col-lg-4">
                                    <div class="area">
                                        <p style="margin-left: 120px;"><strong>dicas</strong></p>
                                            <ul style="margin-top: 30px;">
                                                <li style="text-align: justify">Assegure-se que haja uma boa <strong>iluminação</strong> para captar o <strong>alvo</strong>;</li>
                                                <li style="text-align: justify">Clique no botão <strong>"ligar câmera</strong> e <strong>permita</strong> que o navegador utilize sua <strong>câmera</strong>;</li>
                                                <li style="text-align: justify">Posicione o "alvo" no <strong>centro</strong> da Câmera;</li>
                                                <li style="text-align: justify">Click no botão capturar foto;</li>
                                                <li style="text-align: justify">Verifique o resultado em <strong>Prévia</strong>;</li>
                                                <li style="text-align: justify">Se o resultado for satisfatório, click no botão <strong>Salvar esta Imagem</strong>, caso contrário, ajuste novamente o alvo no centro da câmera e repita os passos anteriores;</li>
                                            </ul>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                        <p style="margin-left: 120px;"><strong>webcam</strong></p>
                                        <video autoplay="true" id="webCamera" playsinline="" width="320" height="240"></video>
                                        <div style="margin-left: 7%">
                                        <button type="button" class="btn btn-secondary" onclick="loadCamera()"><i class="fas fa-camera"></i> ligar câmera</button>
                                        <button type="button" class="btn btn-secondary" onclick="takeSnapShot()"><i class="fas fa-portrait"></i> captura foto</button>
                                        </div>
                                </div>

                                <div class="col-lg-4">
                                    <p style="margin-left: 120px;"><strong>prévia</strong></p>
                                    <div id="results"></div>
                                    <input type="hidden" id="imagemassociadobase64" name="imagem">
                                    <textarea id="base_img" name="base_img" style="display: none"></textarea>
                                    <p id="caminhoImagem" class="caminho-imagem"><a href="" target="_blank"></a></p>
                                </div>

                            </div>
                        </fieldset>
                        <br>
                        <br>
                        <br>
                        <hr>

                        <!-- FIM TIRAR FOTO -->

                        <!-- Button -->
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col text-center">
                                    <a class="btn btn-primary" href="{{route('admin.associado.index')}}" role="button">Cancelar</a>
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
