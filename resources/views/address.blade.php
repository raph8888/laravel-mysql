@extends('layouts.master')

@section('content')

    <body onload="initialize()">

    <div class="login_main">
        <br><br>

        <div class="container">

            <div class="row">

                <div class="col-xs-12">
                    <div style="padding: 0px; display: block; margin-left: auto; margin-right: auto"
                         id="map-canvas"></div>
                </div>

                <div class="col-xs-12">
                    <h2>Copiadora Montes Claros</h2>

                    <p>Rua Coronel Altino de Freitas, 399<br>
                        Montes Claros - MG, 39400-023, Brazil<br>
                        (38) 3221-0798 / (38) 3213-5080</p>
                </div>

            </div>

        </div>

    </div>

    </body>

@endsection