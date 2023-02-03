@extends('layouts.app')

@section('content')

    <body class="bodymotas">
        <div class="titulo_paginas">
            <h1> CARRINHO possui {{Cart::count()}} motas</h1>
            @if (Cart::count()>0)
            @foreach (Cart::content() as $mota )
            {{$mota->id}}
                {{$mota->nome}}
                {{$mota->preco}}



            @endforeach
            @else
            <p>No item in cart </p>
            @endif

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
