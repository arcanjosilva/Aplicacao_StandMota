@extends('layouts.app')

@section('content')

    <body>
        <div class="titulo_paginas">
            <h1> STAND DE MOTOS</h1>
        </div>



        <div class="box">
            @if (!isset($actMarca))
                <b>
            @endif
            <a style="color:black" href="{{ route('motas.index') }}">Todas as Motas</a>


            @if (!isset($actMarca))
                </b>
            @endif
            @foreach ($marcas as $marca)
                @if (isset($actMarca) && $actMarca == $marca->id)
                    <b>
                @endif
                <a style="color:black" href="{{ route('motas.by.estiloMota', $marca->id) }}">{{ $marca->nome }}</a>
                @if (isset($actMarca) && $actMarca == $marca->id)
                    </b>
                @endif
            @endforeach
        </div>
        <form action="{{ route('motas.search') }}" method="GET">
            @csrf
            <input type="text" name="search" placeholder="Filtrar">
            <input type="radio" name="order" id="order" value="ASC" checked="checked"> Ascendente
            <input type="radio" name="order" id="order" value="DESC"> Descendente
            <button type="submit"> Filtrar</button>

        </form>




        <div class="container" style="padding: 50px">
            <div class="boxmotasgeral">
                @foreach ($motas as $mota)
                    <div class="boxmotaindividual">
                        <a href="{{ route('motas.show', $mota->id) }}" style="flex-wrap:wrap-reverse">
                            <img src="{{ $mota['img'] }}" alt="img/mota" style="width: 300px;height:70%;">
                            <h2 style="text-align: center;color: red;"> {{ $mota['nome'] }}</h2>
                            <p style="text-align: center; color: black;"> {{ $mota['preco'] }}</p>

                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="contactosModelos">
            <a href="{{ route('motas.contacto') }}">Contactar para mais informações</a>
        </div>

    </body>
    <div class="experiencia">
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
                <a class="instagram" href="https://www.instagram.com/arcanjosilvaa/?hl=en">Instagram</a>
                <br />
                <a class="instagram" href="https://www.tiktok.com/@arcanjosilvaa?lang=en">Tik Tok</a>
            </div>
        </footer>
    </div>
@endsection
