@extends('layouts.main')
@section('title', "Autoconf | Sistema de cadastramento de veículos - Painel")
@section('content')
    <div class="conteudo-center-painel">
        <div class="container-painel-div">
            <p class="container-painel-div-titulo-paginas">Painel </p>
            <div class="container-painel-div-boas-vindas">
                <p>Olá, bem-vindo(a) ao sistema de cadastramento de veículos da <b>Autoconf</b>.</p>
                <br><br>
                O sistema de cadastramento de veículos da <b>Autoconf</b> foi criado para facilitar a organização da sua loja de carros, a otimização do seu tempo e o aumento de suas vendas.<br>
                Então, para que você possa aproveitar 100% das funcionalidades deste sistema nós listamos abaixo algumas instruções de uso, para que desde já você comece organizar o seu trabalho, otimizar seu tempo e lucrar muito mais. 
                <br><br>
                <b>Como o sistema de cadastramento de veículos da Autoconf funciona?</b><br><br>

                <b>Marcas:</b> Dentro da aba "Marcas" você realiza o cadastro das marcas com a qual sua loja trabalha. <br>
                <b>Ex:</b> Audi, BMW, Volkswagen, Chevrolet entre outras...<br>
                <b>Listar Marcas:</b> Dentro da aba "Listar Marcas" você encontra a lista completa de todas as marcas de veículos com a qual sua loja trabalha. <br>
                <b>Obs:</b> Só é possível excluir alguma marca caso a mesma não possua vínculo com nenhum modelo cadastrado no sistema.<br><br>

                <b>Modelos:</b> Dentro da aba "Modelos" você realiza o cadastro dos modelos de veículos que sua loja possui no estoque e também faz a vinculação deste modelo com a marca que ele pertence. <br>
                <b>Ex:</b> Jetta Comfortline 2.0 > Volkswagen<br>
                <b>Listar Modelos:</b> Dentro da aba "Listar Modelos" você encontra a lista completa de todos os modelos de veículos que possui no estoque da sua loja. <br>
                <b>Obs:</b> Só é possível excluir algum modelo caso o mesmo não esteja cadastrado na aba "Veículos".<br><br>

                <b>Veículos:</b> Dentro da aba "Veículos" você realiza o cadastro da foto do veículo, preço, marca e modelo para que esse veículo possa aparecer no site da sua loja. <br>
                <b>Listar Veículos:</b> Dentro da aba "Listar Veículos" você encontra a lista completa de todos os veículos que estão ativos no site da sua loja. <br>
            </div>
        </div>
    </div>
@endsection