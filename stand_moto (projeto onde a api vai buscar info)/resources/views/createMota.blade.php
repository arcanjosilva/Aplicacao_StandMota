@extends('layouts.app')

@section('content')

    <body>
        <div class="titulo_paginas">
            <h1>
                @if (isset($mota))
                    Atualizar dados da Mota <b>{{ $mota['nome'] }} </b>
                @else
                    Criar Mota
                @endif
            </h1>
        </div>

        <div class="detalhes">
            <p class="message">{{ session('mssg') }} </p>
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="criarmota">
                <form method="POST" enctype="multipart/form-data"
                    @if (isset($mota)) action="{{ route('motas.update', $mota->id) }}"
            @else
            action="{{ route('motas.store') }}" @endif>
                    @csrf
                    @if (isset($mota))
                        @method('PUT')
                    @endif
                    <label for="nome"> Nome da Mota:</label>
                    <input type="text" id="nome" name="nome"
                        @if (isset($mota)) value="{{ $mota->nome }}" @endif>
                    <br>
                    <label for="desc"> Descrição da Mota:</label>
                    <input type="text" id="desc" name="desc"
                        @if (isset($mota)) value="{{ $mota->desc }}" @endif>

                    <br>

                    <input type="hidden" id="changed" name="changed" value="false">
                    <label for="url"> Imagem da Mota:</label>
                    <input type="file" id="img" name="img"
                        onchange="document.getElementById('changed').value='true';">
                    @if (isset($mota))
                    @endif
                    <br>
                    <label for="preco"> Preco da Mota:</label>
                    <input type="text" id="preco" name="preco"
                        @if (isset($mota)) value="{{ $mota->preco }}" @endif>
                    <br>
                    <div class="submit" style="display: flex; justify-content: center; padding-top:10px">
                        <select name="tipoMota" id=tipoMota>
                            @foreach ($marcas as $marca)
                                <option value="{{ $marca->id }}"
                                    @if (isset($mota) && $mota->marca_id == $marca->id) selected="selected" @endif>
                                    {{ $marca->nome }} </option>
                            @endforeach
                        </select>

                        <input type="submit"
                            @if (isset($mota)) value="Editar Mota"
                @else
                value="Criar Mota" @endif>
                </form>
            </div>
        </div>
        <div class="voltar">
            <a href="/motas"> Voltar às Motas </a>
        </div>
        </div>



    </body>

    <footer class="finalcompleto"
        style=" background-color: dimgrey;
    display: flex;
    justify-content: space-around;
    padding: 25px;">
        <div class="contactos" style="color: white;">
            <p class="textonaoimportante" style="color: white;"><b> Contatos </b></p>
            <p class="textonaoimportante" style="color: white;">
                Rua de Santa Maria, nº 253 <br />
                <br />
                291 202020 <br />
                arcanjosilva131@gmail.com
            </p>
        </div>
        <div class="redessocias" style="color: white;">
            <p class="textonaoimportante" style="color: white;"><b> Redes Sociais</b></p>
            <a class="instagram" style="color: white;" href="https://www.instagram.com/arcanjosilvaa/?hl=en">Instagram</a>
            <br />
            <a class="instagram" style="color: white;" href="https://www.tiktok.com/@arcanjosilvaa?lang=en">Tik Tok</a>
        </div>
    </footer>
@endsection
