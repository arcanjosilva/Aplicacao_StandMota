@extends('layouts.app')

@section('content')

    <body class="bodymotas">
        <div class="titulo_paginas">
            <h1> MARCAS DE MOTOS - DETALHES </h1>
        </div>


        <div class="detalhes">
            @if (isset($marca))
                <div class="boxmotaindividualgeral">
                    <img src="{{ $marca['img'] }}" alt="mota/img" style="width: 400px">
                </div>
                <div class="nomemotasdetalhes" >
                    <h2>{{ $marca['nome'] }}</h2>
                </div>
                <p>{{ $marca['bio'] }}</p>
                <h2>Ranking:{{ $marca['ranking'] }}</h2>
            @else
                <h1> O produto nao existe </h1>
            @endif

            @auth
                @if ($marca->created_by_m == auth()->user()->id || auth()->user()->isAdmin)
                    <form action="{{ route('marcas.destroy', $marca->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button> Eliminar MARCA </button>
                    </form>

                    <form action="{{ route('marcas.edit', $marca->id) }}" method="GET">
                        @csrf
                        <button> Editar MARCA </button>
                    </form>
                @endif
            @endauth



            <a href="/marcas"> Voltar as marcas </a>

        </div>
    </body>
    <div class="experiencia" >
        <footer class="finalcompleto">
               <div class="contactos" >
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
