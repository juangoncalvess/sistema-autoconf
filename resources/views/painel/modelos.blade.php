@extends('layouts.main')
@section('title', "Autoconf | Sistema de cadastramento de veículos - Painel")
@section('content')
    <div class="conteudo-center-painel">
        <div class="container-painel-div">
            <p class="container-painel-div-titulo-paginas">Painel > Modelos > {{ $url }}</p>
            @if($url != "listar")
                <form class="container-painel-div-form" action="{{ $url == 'editar' ? asset('painel/modelos/put/'.$resultDB->id) : asset('painel/modelos/cadastrar') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($url == "editar") 
                        @method('PUT')
                    @endif
                    <div class="wid-60pc">
                        <p>Modelo: <b>*</b></p>
                        <input type="text" name="modelo" value="{{ $url == 'editar' ? $resultDB->modelo : '' }}" required>
                    </div>
                    <div class="wid-38pc">
                        <p>Marca: <b>*</b></p>
                        <select name="id_marca" required>
                            <option value="" hidden>Selecione</option>
                            @foreach($result_marcas as $marca)
                                @if($url == "editar")
                                    <option value="{{ $marca->id }}" {{ $resultDB->id_marca == $marca->id ? 'selected' : '' }}>{{ $marca->marca }}</option>  
                                @else
                                    <option value="{{ $marca->id }}">{{ $marca->marca }}</option>  
                                @endif
                            @endforeach
                        </select>
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
                            <td>Modelo</td>
                            <td class="txt-align-center box-shadow-acao">Marca</td>
                            <td class="txt-align-center box-shadow-acao">Ação</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($resultDB as $res)
                            <tr class="{{ $loop->index % 2 == 0 ? 'listra-branca' : '' }}">
                                <td>{{ $res->modelo }}</td>
                                <td class="box-shadow-acao txt-align-center">{{ $res->marca }}</td>   
                                <td class="box-shadow-acao"> 
                                    <div class="botoes-de-acao">
                                        <a href="{{ asset('painel/modelos/editar/'.$res->id) }}" class="editar">Editar</a>
                                        @if(array_search($res->id, $veiculosDB) == "")
                                            <a class="excluir excluir-js" id="{{ asset('painel/modelos/deletar/'.$res->id) }}">Excluir</a>
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