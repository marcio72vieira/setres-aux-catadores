@extends('templateapi.layoutapi')

@section('conteudo-principal')

    <header>
        <img
            src="{{asset('templateapi/images/Header BLACK OPACO APP SVG (537 x 211).svg')}}"
            alt="Logo Pró Catador"
        />
    </header>

    <main class="container" id="container">
        <div class="imageContainer">
            <div class="imagePhoto">
                <img id="imagePhoto" alt="imagem">

            </div>
        </div>

        <div class="container-inside">
            <h3>NOME</h3>
            <div class="profileContainer">
                <p id="nome"></p>
            </div>
            <h3>NÚMERO DA CARTEIRA</h3>
            <div class="profileContainer">
                <p id="carteira"></p>
            </div>
            <h3>COOPERATIVA</h3>
            <div class="profileContainer">
                <p id="cooperativa"></p>
            </div>
        </div>
    </main>
    <main id="registro"></main>
    </main>

    <div style="text-align: center;" >
        <img src="{{ asset('storage/'.$associado->imagem) }}" width="200">
        <h4>{{$associado->nome}}</h4>
        <h4>{{$associado->idqrcode}}</h4>
        <h4>{{$associado->nomecompanhia}}</h4>
    </div>

@endsection
