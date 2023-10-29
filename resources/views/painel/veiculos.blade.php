@extends('layouts.main')
@section('title', "Autoconf | Sistema de cadastramento de veículos - Painel")
@section('content')
    <div class="conteudo-center-painel">
        <div class="container-painel-div">
            <p class="container-painel-div-titulo-paginas">Painel > Veículos > {{ $url }}</p>
            @if($url != "listar")
                <form class="container-painel-div-form" action="{{ $url == 'editar' ? '/painel/veiculos/put/'.$resultDB->id : '/painel/veiculos/cadastrar' }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    @if($url == "editar")
                        @method('PUT')
                    @endif
                    <div class="wid-20pc">
                        <p>Foto: <b>Tam. rec: 800x600</b></p> 
                        <label class="container-preview-foto">
                            <span class="preview-foto">
                                @if($url == "editar")
                                    <img src="{{ $resultDB->imagem == '' ? asset('img/veiculos/foto-em-breve.jpg') : asset('img/veiculos/'.$resultDB->imagem) }}">
                                @else
                                    <img src="{{ asset('img/veiculos/foto-em-breve.jpg') }}">
                                @endif 
                            </span> 
                            <strong>Foto do Veículo</strong>
                            <input class="preview-foto-js" type="file" name="imagem">
                        </label>
                    </div>
                    <div class="wid-78pc">
                        <div class="wid-100pc">
                            <p>Marca: <b>*</b></p>
                            <select class="input-marca" name="id_marca" required>
                                <option value="" hidden>Selecione</option>
                                @foreach($marcasDB as $marca)
                                    @if($url == "editar")
                                        <option value="{{ $marca->id }}" {{ $resultDB->id_marca == $marca->id ? 'selected' : '' }}>{{ $marca->marca }}</option>  
                                    @else
                                        <option value="{{ $marca->id }}">{{ $marca->marca }}</option>  
                                    @endif 
                                @endforeach
                            </select>
                        </div>
                        <div class="wid-40pc">
                            <p>Modelo: <b>*</b></p>
                            <select class="input-modelo" name="id_modelo" required>
                                <option value="" hidden>Primeiro selecione a marca...</option>
                                @if($url == "editar")
                                    @foreach($modelosDB as $modelo) 
                                        @if($resultDB->id_marca == $modelo->id_marca)
                                            <option value="{{ $modelo->id }}" {{ $resultDB->id_modelo == $modelo->id ? 'selected' : '' }}>{{ $modelo->modelo }}</option>                                      
                                        @endif  
                                    @endforeach
                                @endif 
                            </select>
                        </div>
                        <div class="wid-100pc">
                            <div class="wid-40pc">
                                <p>Preço: <b>*</b></p>
                                <input type="text" name="preco" class="input-preco" value="{{ $url == 'editar' ? number_format($resultDB->preco,2,',','.') : '' }}" required>
                            </div>
                            <div class="wid-100pc">
                                @if($url == "cadastrar")
                                    <button class="button-acao-{{ $url }}">Cadastrar</button>
                                @else
                                    <button class="button-acao-{{ $url }}">Salvar</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </form> 
            @else
                <table class="container-painel-div-table">
                    <thead>
                        <tr>
                            <td>Modelo</td>
                            <td class="txt-align-center box-shadow-acao">Marca</td>
                            <td class="txt-align-center box-shadow-acao">Preço</td>
                            <td class="txt-align-center box-shadow-acao">Ação</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($resultDB as $res)
                            <tr class="{{ $loop->index % 2 == 0 ? 'listra-branca' : '' }}">
                                <td>{{ $res->modelo }}</td>
                                <td class="box-shadow-acao txt-align-center">{{ $res->marca }}</td>
                                <td class="box-shadow-acao txt-align-center">R$ {{ number_format($res->preco,2,",",".") }}</td>
                                <td class="box-shadow-acao">
                                    <div class="botoes-de-acao">
                                        <a href="/painel/veiculos/editar/{{ $res->id }}" class="editar">Editar</a>
                                        <a class="excluir excluir-js" id="/painel/veiculos/deletar/{{ $res->id }}">Excluir</a>
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