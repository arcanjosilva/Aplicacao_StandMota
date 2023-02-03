@extends('layouts.app')

@section('content')


    <body>
        <div class="titulo_paginas">
            <h1> STAND DE MOTOS - WELCOME </h1>
        </div>

        <div class="imagemwelcome">
            <div class="img">
                <img src="/img/loja.jpg" alt="loja/img" style="width: 750px">
            </div>
        </div>
        <div class="botoeswelcome" style="display: flex;justify-content: space-around;">
            <a href="{{ route('motas.index') }}"> Ver Motas </a>
            <a href="{{ route('marcas.index') }}">Ver Marcas </a>
        </div>

    </body>
    <div class="titulo_random">
        <h1>Destaques do Dia</h1>
    </div>

    <div class="container" style="padding: 50px">
        <div class="boxmotasgeral">
            @foreach ($motas as $mota)
                <div class="boxmotaindividual">
                    <a href="{{ route('motas.show', $mota->id) }}" style="flex-wrap:wrap-reverse">
                        <img src="{{ $mota['img'] }}" alt="img/mota" style="width: 300px;height:243px;">
                        <h2 style="text-align: center;color: red;"> {{ $mota['nome'] }}</h2>
                        <p style="text-align: center; color: black;"> {{ $mota['preco'] }}</p>

                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <footer class="finalcompleto">
        <div class="contactos">
            <p class="textonaoimportante"><b> Contatos </b></p>
            <p class="textonaoimportante">
                Rua de Santa Maria, nº 253 <br />
                <br />
                291 202020 <br />
                arcanjosilva131@gmail.com
            </p>
        </div>
        <div class="redessocias">
            <p class="textonaoimportante"><b> Redes Sociais</b></p>
            <a class="instagram"  href="https://www.instagram.com/arcanjosilvaa/?hl=en">Instagram</a>
            <br />
            <a class="instagram" href="https://www.tiktok.com/@arcanjosilvaa?lang=en">Tik Tok</a>
        </div>
    </footer>
@endsection
