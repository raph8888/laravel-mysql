@extends('layouts.master')

@section('content')


    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBslZHQjMA_mDDSJoD8wKZTmwa_zCwJtF8&callback=initMap" type="text/javascript"> </script>

    <script   type="text/javascript">
        function initialize() {
            var mapCanvas = document.getElementById('map-canvas');
            var mapOptions = {
                center: new google.maps.LatLng(-16.7224000, -43.8656600),
                zoom: 18,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            var map = new google.maps.Map(mapCanvas, mapOptions);

            var iconBase = 'https://maps.google.com/mapfiles/kml/paddle/';

            // Creating a marker and positioning it on the map
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(-16.7223000, -43.8656600),
                map: map,
                icon: iconBase + 'blu-circle.png'
            })

        }
        google.maps.event.addDomListener(window, 'load', initialize);

    </script>



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

@endsection