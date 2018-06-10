<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('layouts/head')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<?php $dayid = "li-" . date('d-m-Y'); ?>

<style>

    .tabelaacesso {
        padding-left: 60px;
    }

    #<?php echo $dayid; ?> {
        background-color: #7092BE !important;
        color:white !important;}
    .end {
        background-color: #E0D4D4 !important;
    }

</style>

<body>

<div class="container-fluid">

    <div class="row">

        <div class="col-xs-2 col-md-2 text-center no-padding-left">
            <nav id="main-menu" role="navigation">
                <div class="block">
                    <div id="logo-wrapper">
                        <a id="logo" title="Copiadora Montes Claros" href={{ url('/status') }}>
                            <img id="logo-main-page" src="images/Untitled.png" alt="Copiadora Montes Claros logo">
                        </a>
                    </div>
                    <ul>
                        <li id="logout-btn-wrapper">
                            <a title="Analisar tabelas" href={{ url('/status') }}>
                                Caixa
                            </a>
                        </li>
                        <li id="logout-btn-wrapper">
                            <a title="Graficos" href={{ url('/charts') }}>
                                Gráficos
                            </a>
                        </li>
                        <li id="logout-btn-wrapper">
                            <a title="Analisar tabelas" href={{ url('/costs') }}>
                                Custos
                            </a>
                        </li>
                        <li id="logout-btn-wrapper">
                            <a onclick="return confirm('Tem certeza que deseja sair?')"
                               title="Desconectar Copiadora Montes Claros" href={{ url('/flush') }}>
                                Sair
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="col-xs-10 col-md-10 text-center no-padding-right">

            <header>
                <div id="top-menu-profile-wrapper">
                    <div id="top-menu-profile-text">
                        <p>{!! isset($greetings) ? $greetings : null !!}</p>
                        <div class="noprint">
                            <a onclick="return confirm('Tem certeza que deseja sair?')"
                               href={{ url('/flush') }} class="top-menu-link">Sair</a>
                        </div>
                    </div>
                </div>
            </header>

            @yield('content')
        </div>

    </div>
</div>

@include('layouts/footer')

</body>
</html>