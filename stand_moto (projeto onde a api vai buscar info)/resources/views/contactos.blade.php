@extends('layouts.app')

@section('content')

    <body>

        <form name="meu_form">

            <h1 class="titulo_paginas">Entre em contato connosco</h1>
            <div>
                <label for="nome">Nome:</label>
                <input type="text" id="nomeid" placeholder="Arcanjo Silva" required="required" name="nome" />
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="emailid" placeholder="exemplo@mail.com" required="required" name="email" />
            </div>


                <div>

                <textarea placeholder="Deixe sua opinião" required="required"></textarea>
            </div>
            <input type="submit" class="enviar" onclick="Enviar();" value="Enviar" />
        </form>



    <footer class="finalcompleto">
        <div class="contactos">
            <p class="textonaoimportante"><b> Contatos </b></p>
            <p class="textonaoimportante" >
                Rua de Santa Maria, nº 253 <br />
                <br />
                291 202020 <br />
                arcanjosilva131@gmail.com
            </p>
        </div>
        <div class="redessocias" >
            <p class="textonaoimportante" style="color: white;"><b> Redes Sociais</b></p>
            <a class="instagram"href="https://www.instagram.com/arcanjosilvaa/?hl=en">Instagram</a>
            <br />
            <a class="instagram"  href="https://www.tiktok.com/@arcanjosilvaa?lang=en">Tik Tok</a>
        </div>
    </footer>

@endsection
