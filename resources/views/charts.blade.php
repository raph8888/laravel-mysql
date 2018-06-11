@extends('layouts.master2')
@section('content')

    <br>
    <br>

    <div class="status-container status-container-background">

        De: <input type="text" id="datepickerstart">
        Até: <input type="text" id="datepickerend">

        <input id="submitForm" type='button' value='Buscar por período'>



        <div id="chart_entrada_div"></div>
        <div id="chart_saida_div"></div>

    </div>

    <script type="text/javascript">

        $( function() {
            $( "#datepickerstart" ).datepicker({
                changeMonth: true,
                changeYear: true
            });
            $( "#datepickerend" ).datepicker({
                changeMonth: true,
                changeYear: true
            });

        } );


        $(function () {
            $('#submitForm').click(function () {
                var start = $('#datepickerstart').val();
                var end = $('#datepickerend').val();


                // Load the Visualization API and the corechart package.
                google.charts.load('current', {'packages':['corechart', 'bar']});

                google.charts.setOnLoadCallback(mandaCharts);

                function mandaCharts() {
                    var jsonData = $.ajax({
                        url: "/chartscashier",
                        data: {
                            start: start,
                            end: end
                        },
                        dataType: "json",
                        async: false
                    }).responseText;

                    var data = new google.visualization.DataTable(jsonData);

                    // Set chart options
                    var options = {'title':'Aberturas do Caixa',
                        'width':800,
                        'height':400};

                    // Instantiate and draw our Entrada chart, passing in some options.
                    var entradaChart = new google.visualization.ColumnChart(document.getElementById('chart_entrada_div'));
                    entradaChart.draw(data, options);





                    var jsonDataSaida = $.ajax({
                        url: "/chartssaidacashier",
                        data: {
                            start: start,
                            end: end
                        },
                        dataType: "json",
                        async: false
                    }).responseText;

                    var dataSaida = new google.visualization.DataTable(jsonDataSaida);

                    // Set chart options
                    var optionsSaida = {'title':'Fechamentos do Caixa',
                        'width':800,
                        'height':400};

                    // Instantiate and draw our Entrada chart, passing in some options.
                    var entradaChart = new google.visualization.ColumnChart(document.getElementById('chart_saida_div'));
                    entradaChart.draw(dataSaida, optionsSaida);



                }






            });
        });

        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages':['corechart', 'bar']});


        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {

            var jsonData = $.ajax({
                url: "/chartscashier",
                dataType: "json",
                async: false
            }).responseText;



            var saidaJsonData = $.ajax({
                url: "/chartssaidacashier",
                dataType: "json",
                async: false
            }).responseText;


            // Create our data table out of JSON data loaded from server.
            var data = new google.visualization.DataTable(jsonData);
            var saidaData = new google.visualization.DataTable(saidaJsonData);

            // Set chart options
            var options = {'title':'Aberturas do Caixa',
                'width':800,
                'height':400};

            // Instantiate and draw our Entrada chart, passing in some options.
            var entradaChart = new google.visualization.ColumnChart(document.getElementById('chart_entrada_div'));
            entradaChart.draw(data, options);


            // Set chart options
            var options = {'title':'Fechamentos do Caixa',
                'width':800,
                'height':400};


            // Instantiate and draw our Saida chart, passing in some options.
            var Saidachart = new google.visualization.ColumnChart(document.getElementById('chart_saida_div'));
            Saidachart.draw(saidaData, options);
        }
    </script>
@endsection