<!DOCTYPE html>
<html lang="en">
<head>
    <title>Copiadora Montes Claros</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Copiadora Montes Claros é a mais tradicional copiadora da cidade.
    Cópias, plastificação, encadernação, reforma de livros e documentos, envio de fax, impressão e digitalização
    de documentos.">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    {{--<link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'>--}}

    {{--<script src='http://codepen.io/assets/libs/fullpage/jquery_and_jqueryui.js'></script>--}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="shortcut icon" href="images/imageedit_3_2454083684.png" />

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <script async defer type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBslZHQjMA_mDDSJoD8wKZTmwa_zCwJtF8&?sensor=true"> </script>


    <script src="js/javascript.js"></script>

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
            <a href= {{ $path }} align="center"
               style="text-decoration: none; color: #5196D5;">
                <h1>Copiadora Montes Claros</h1>
            </a>
            <div class="menu1">
                <div class="menu1-li col-xs-12 col-md-4">
                    <a href={{ $path }} >
                        <span>Serviços</span>
                    </a>
                </div>
                <div class="menu1-li col-xs-12 col-md-4">
                    <a href={{ $path }}/contact>
                        <span>Contato</span>
                    </a>
                </div>
                <div class="menu1-li lastItem col-xs-12 col-md-4">
                    <a href={{ $path }}/address>
                        <span>Endereço</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="hidden-xs hidden-sm col-md-2">
            <img src="images/Untitled.png"  style="width: 100%; max-width: 180px;">
        </div>
    </div>

</div>

@yield('content')

<br><br><br><br><br><br>

<div style="text-align:center"><p>Rua Coronel Altino de Freitas, 399 - Montes Claros - MG, 39400-023</p>

    <p>(38) 3221-0798</p></div>

<br><br><br>

</body>
</html>