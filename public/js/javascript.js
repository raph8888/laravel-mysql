$(function () {
    $(".img-services").hide();
    var img_services = [".segundo", ".terceiro", ".quarto", ".quinto", ".sexto", ".setimo", ".oitavo", ".nono"];
    var x = 800;
    var i = 0;

    setTimeout(function () {
        $(String(img_services[i])).fadeIn(2000);
    }, x);
    var x = x + 500;

    setTimeout(function () {
        $(String(img_services[i + 1])).fadeIn(2000);
    }, x);
    var x = x + 500;

    setTimeout(function () {
        $(String(img_services[i + 2])).fadeIn(2000);
    }, x);
    var x = x + 500;

    setTimeout(function () {
        $(String(img_services[i + 3])).fadeIn(2000);
    }, x);
    var x = x + 500;

    setTimeout(function () {
        $(String(img_services[i + 4])).fadeIn(2000);
    }, x);
    var x = x + 500;

    setTimeout(function () {
        $(String(img_services[i + 5])).fadeIn(2000);
    }, x);
    var x = x + 500;

    setTimeout(function () {
        $(String(img_services[i + 6])).fadeIn(2000);
    }, x);
    var x = x + 500;

    setTimeout(function () {
        $(String(img_services[i + 7])).fadeIn(2000);
    }, x);
    var x = x + 500;

});

// $(function () {
//     $('#task-name').focus();
// });

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


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
    });

}
// google.maps.event.addDomListener(window, 'load', initialize);