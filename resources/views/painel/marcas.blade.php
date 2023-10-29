@extends('layouts.main')
@section('title', "Autoconf | Sistema de cadastramento de veículos - Painel")
@section('content')
    <div class="conteudo-center-painel">
        <div class="container-painel-div">
            <p class="container-painel-div-titulo-paginas">Painel > Marcas > {{ $url }}</p>
            @if($url != "listar")
                <form class="container-painel-div-form" action="{{ $url == 'editar' ? '/painel/marcas/put/'.$resultDB->id : '/painel/marcas/cadastrar' }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($url == "editar")
                        @method('PUT')
                    @endif
                    <div class="wid-100pc">
                        <p>Marca: <b>*</b></p>
                        <input type="text" name="marca" value="{{ $url == 'editar' ? $resultDB->marca : '' }}" required>
                    </div>
                    <div class="wid-100pc"> 
                        @if($url == "cadastrar")
                            <button class="button-acao-{{ $url }}">Cadastrar</button>
                        @else
                            <button class="button-acao-{{ $url }}">Salvar</button>
                        @endif
                    </div>
                </form> 
            @else
                <table class="container-painel-div-table">
                    <thead>
                        <tr>
                            <td>Marca</td>
                            <td class="txt-align-center box-shadow-acao">Ação</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($resultDB as $res)
                            <tr class="{{ $loop->index % 2 == 0 ? 'listra-branca' : '' }}">  
                                <td>{{ $res->marca }}</td> 
                                <td class="box-shadow-acao">
                                    <div class="botoes-de-acao">
                                        <a href="/painel/marcas/editar/{{ $res->id }}" class="editar">Editar</a>
                                        @if(array_search($res->id, $modelosDB) == "")
                                            <a class="excluir excluir-js" id="/painel/marcas/deletar/{{ $res->id }}">Excluir</a>
                                        @else
                                            <a class="excluir opacity02">Excluir</a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection