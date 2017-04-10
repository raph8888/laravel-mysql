// Load the Visualization API and the corechart package.
google.charts.load('current', {'packages':['corechart']});

// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawChart);

// Callback that creates and populates a data table,
// instantiates the pie chart, passes in the data and
// draws it.
function drawChart() {

    // Create the data table.
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Topping');
    data.addColumn('number', 'Slices');
    data.addRows([
        ['Mushrooms', 3],
        ['Onions', 1],
        ['Olives', 1],
        ['Zucchini', 1],
        ['Pepperoni', 2]
    ]);

    // Set chart options
    var options = {'title':'How Much Pizza I Ate Last Night',
        'width':400,
        'height':300};

    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}


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