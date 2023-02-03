@extends('layouts.app')

@section('content')

    <body>
        <div class="titulo_paginas">
            <h1> MARCAS DE MOTOS </h1>
        </div>
        <div class="melhoramentocontainer">
            <div class="container"style="display: flex;overflow-x:scroll;box-shadow: inset 0 -3em 3em rgba(0, 0, 0, 0.1), 0 0 0 2px rgb(0, 0, 0),0.3em 1em 2em rgb(0, 0, 0)">
                @foreach ($marcas as $marca)
                <div class="boxmotaindividual" style="padding: 20px;">
                    <a href="{{ route('marcas.show', $marca->id) }}" style="flex-wrap:wrap-reverse">
                        <img src="{{ $marca['img'] }}" alt="img/marca" style="width: 300px;height:70%;">
                        <h2> {{ $marca['nome'] }}</h2>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        <div class="contactosModelos2">
            <a href="{{'contactos'}}">Contactar para mais informações</a>
        </div>
    </body>
    <div class="experiencia" style="padding-top: 20px">
        <footer class="finalcompleto">
            <div class="contactos">
                <p class="textonaoimportante" ><b> Contatos </b></p>
                <p class="textonaoimportante" >
                    Rua de Santa Maria, nº 253 <br />
                    <br />
                    291 202020 <br />
                    arcanjosilva131@gmail.com
                </p>
            </div>
            <div class="redessocias" >
                <p class="textonaoimportante" ><b> Redes Sociais</b></p>
                <a class="instagram"
                    href="https://www.instagram.com/arcanjosilvaa/?hl=en">Instagram</a>
                <br />
                <a class="instagram" href="https://www.tiktok.com/@arcanjosilvaa?lang=en">Tik Tok</a>
            </div>
        </footer>
    </div>
@endsection
