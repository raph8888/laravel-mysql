<!DOCTYPE html>
<html lang="en">
<head>

    @include('layouts/head')

    <meta name="csrf-token" content="{{ csrf_token() }}"/>

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

<div class="container">

    <div class="row">
        <div class="col-xs-12">
            <a href={{ url('/') }}><p
                        style="float:right; padding-right: 20px; padding-top: 20px;">Sair da Área Administrativa</p>
            </a>
        </div>
    </div>


    <div class="row">
        <div class="hidden-xs col-md-2">
            <img src="images/Untitled.png" style="width: 100%; max-width: 180px;">
        </div>
        <div class="col-xs-12 col-md-8 text-center">
            <a href= {{ url('/') }} align="center"
               style="text-decoration: none; color: #5196D5;">
                <h1>Copiadora Montes Claros</h1>
            </a>
            <a href= {{ url('/status') }}><h2>Área Administrativa</h2></a>

        </div>
        <div class="hidden-xs col-md-2">
            <img src="images/Untitled.png" style="width: 100%; max-width: 180px;">
        </div>
    </div>

</div>

@yield('content')

@include('layouts/footer')

</body>
</html>