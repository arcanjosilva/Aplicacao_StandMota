@extends('layouts.app')

@section('content')

    <body class="bodymotas">
        <div class="titulo_paginas">
            <h1> Detalhes sobre a {{ $mota['nome'] }} </h1>
        </div>

        <div class="boxmotasdetalhesgeral">
            @if (isset($mota))
                <div class="boxmotaindividualgeral">
                    <div class="boxmotaindividualgeralImg">
                        <img src="{{ $mota['img'] }}" alt="mota/img" style="width: 400px">
                    </div>
                </div>
                <div class="nomemotasdetalhes">
                <h2>{{ $mota['nome'] }}</h2>
                </div>
                <p>{{ $mota['desc'] }}</p>
                <b>PREÇO: </b><b class="motapreco">{{ $mota['preco'] }}</b>
            @else
                <h1> O Mota nao existe </h1>
            @endif

            @auth
                @if ($mota->created_by == auth()->user()->id || auth()->user()->isAdmin)
                    <form action="{{ route('motas.destroy', $mota->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button> Eliminar MOTA </button>
                    </form>
                    <form action="{{ route('motas.edit', $mota->id) }}" method="GET">
                        @csrf
                        <button> Editar MOTA </button>
                    </form>
                @endif
            @endauth
            <br>
            <div class="voltarmmotas">
            <a href="/motas"> Voltar as motas </a>
            </div>
        </div>

    </body>

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
            <a class="instagram"  href="https://www.tiktok.com/@arcanjosilvaa?lang=en">Tik Tok</a>
        </div>
    </footer>
@endsection
