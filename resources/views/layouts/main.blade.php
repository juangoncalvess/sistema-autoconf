<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>@yield('title')</title>
        <link rel="icon" href="{{ asset('img/favicon.jpg') }}">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"/>
        <meta name="theme-color" content="#0852C5">
    </head>
    <body class="antialiased">
        @if(Request::segment(1) == 'painel')
            <div class="menu-lateral">
                <div class="menu-lateral-logo-autoconf"></div>
                <div class="menu-lateral-links"> 
                    <a href="{{ asset('/painel') }}" class="{{ (Request::segment(1) == 'painel' && Request::segment(2) == '' ? 'menu-lateral-ativo' : '') }}">
                        <ion-icon name="home-outline"></ion-icon>
                        <p>Home</p>  
                    </a>
                    <a href="{{ asset('painel/marcas/cadastrar') }}" class="{{ (Request::segment(2) == 'marcas' && (Request::segment(3) == 'cadastrar' || Request::segment(3) == 'editar')  ? 'menu-lateral-ativo' : '') }}">
                        <ion-icon name="pricetag-outline"></ion-icon>
                        <p>Marcas</p>
                    </a>
                    <a href="{{ asset('painel/marcas/listar') }}" class="{{ (Request::segment(2) == 'marcas' && Request::segment(3) == 'listar'  ? 'menu-lateral-ativo' : '') }}">
                        <ion-icon name="pricetag-outline"></ion-icon>
                        <p>Listar Marcas</p>
                    </a>
                    <a href="{{ asset('painel/modelos/cadastrar') }}" class="{{ (Request::segment(2) == 'modelos' && (Request::segment(3) == 'cadastrar' || Request::segment(3) == 'editar')  ? 'menu-lateral-ativo' : '') }}">
                        <ion-icon name="shuffle-outline"></ion-icon>
                        <p>Modelos</p>
                    </a>
                    <a href="{{ asset('painel/modelos/listar') }}" class="{{ (Request::segment(2) == 'modelos' && Request::segment(3) == 'listar'  ? 'menu-lateral-ativo' : '') }}">
                        <ion-icon name="shuffle-outline"></ion-icon>
                        <p>Listar Modelos</p>
                    </a>
                    <a href="{{ asset('painel/veiculos/cadastrar') }}" class="{{ (Request::segment(2) == 'veiculos' && (Request::segment(3) == 'cadastrar' || Request::segment(3) == 'editar') ? 'menu-lateral-ativo' : '') }}">
                        <ion-icon name="car-sport-outline"></ion-icon>
                        <p>Veículos</p>
                    </a>
                    <a href="{{ asset('painel/veiculos/listar') }}" class="{{ (Request::segment(2) == 'veiculos' && Request::segment(3) == 'listar'  ? 'menu-lateral-ativo' : '') }}">
                        <ion-icon name="car-sport-outline"></ion-icon>
                        <p>Listar Veículos</p>
                    </a>
                    <a href="{{ asset('/') }}" target="_blank">
                        <ion-icon name="desktop-outline"></ion-icon>
                        <p>Voltar para o Site</p>
                    </a>
                </div>
                <div class="menu-lateral-fundo"> 
                    <form class="form-fake2" action="{{ asset('logout') }}" method="POST">
                        @csrf
                        <button>
                            <a>
                                <ion-icon name="log-out-outline"></ion-icon>
                                <p>Logout</p>
                            </a>
                        </button>
                    </form> 
                </div>
            </div>
        @else
            <header class="menu">
                <div class="conteudo-center-1200">
                    <div class="menu-div">
                        <a class="menu-div-logo-autoconf" href="{{ asset('/') }}"></a>
                        <div class="menu-div-links">
                            @guest
                                <a href="{{ asset('login') }}">Acessar Painel</a>
                            @endguest
                            @auth
                                <a href="{{ asset('painel') }}">Painel</a> 
                            @endauth
                        </div>
                    </div> 
                </div>
            </header>
        @endif
        <main>
        <div class="loading"><div class="engloba-loading"><div class="square-center"><div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div></div></div>
            @if(session('msg'))
                <div class="flash-msg">{{ session('msg') }}</div>
            @endif
            @yield('content')
        </main>
        @if(Request::segment(1) != 'painel')
            <footer>
                <p>2023 &copy; Autoconf | Sistema de cadastramento de veículos</p>
            </footer>
        @endif
        @if(Request::segment(1) == 'painel')
            <form class="formulario-de-exclusao" action="" method="POST">
                @csrf
                @method('DELETE')
                <button></button>
            </form> 
        @endif
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>        
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script src="{{ asset('js/funcoes.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    </body> 
</html> 
