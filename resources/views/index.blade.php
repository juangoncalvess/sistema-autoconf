@extends('layouts.main')
@section('title', "Autoconf | Sistema de cadastramento de veículos")
@section('content')
    <div class="slides">
        <div class="owl-carousel">
            <div><img src="{{ asset('img/slides/slide-1.jpg') }}"></div>
            <div><img src="{{ asset('img/slides/slide-2.jpg') }}"></div>
            <div><img src="{{ asset('img/slides/slide-3.jpg') }}"></div>
        </div>
    </div> 
    <div class="conteudo-center-1200">
        <div class="container-veiculos-home">
            <p class="container-veiculos-home-titulo">Veículos em Destaque</p>
            @foreach($result_veiculos as $veiculo)
                <div class="container-veiculos-home-div">
                    <img src="{{ $veiculo->imagem == '' ?  asset('img/veiculos/foto-em-breve.jpg') : asset('img/veiculos/'.$veiculo->imagem) }}" title="{{ $veiculo->marca }} > {{ $veiculo->modelo }}" alt="{{ $veiculo->marca }} > {{ $veiculo->modelo }}">
                    <div class="container-veiculos-home-div-infos">
                        <div class="container-veiculos-home-div-infos-marca">{{ $veiculo->marca }}</div>
                        <div class="container-veiculos-home-div-infos-modelo">{{ $veiculo->modelo }}</div>
                        <div class="container-veiculos-home-div-infos-preco">R$ {{ number_format($veiculo->preco,2,",",".") }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection