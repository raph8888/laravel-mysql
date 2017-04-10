<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts/head')
</head>

<body>

<div class="container">

    <div class="row">
        <div class="col-xs-12">
            <a href={{ $path }}/access>
                <p style="float:right; padding-right: 20px; padding-top: 20px;">Acesso administrativo</p></a>
        </div>
    </div>


    <div class="row">
        <div class="hidden-xs hidden-sm col-md-2">
            <img src="images/Untitled.png" style="width: 100%; max-width: 180px;">
        </div>
        <div class="col-xs-12 col-md-8 text-center">
            <a href={{ $path }} align="center"
               style="text-decoration: none; color: #5196D5;">
                <h1>Copiadora Montes Claros</h1>
            </a>
            <div class="menu1">
                <div class="menu1-li col-xs-12 col-md-4">
                    <a href={{ url('/') }} >
                        <span>Serviços</span>
                    </a>
                </div>
                <div class="menu1-li col-xs-12 col-md-4">
                    <a href={{ url('/contact') }}>
                        <span>Contato</span>
                    </a>
                </div>
                <div class="menu1-li lastItem col-xs-12 col-md-4">
                    <a href={{ url('/address') }}>
                        <span>Endereço</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="hidden-xs hidden-sm col-md-2">
            <img src="images/Untitled.png" style="width: 100%; max-width: 180px;">
        </div>
    </div>

</div>

@yield('content')

@include('layouts/footer')

</body>
</html>