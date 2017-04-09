@extends('layouts.master2')
@section('content')
    <div class="text-center">

        <div class="statuscaixa">

            <h3>{!! isset($situation) ? $situation : null !!}</h3>
            {!! isset($greeting) ? $greeting : null !!}
            <br>
            <br>
            <br>

            <div class="row">
                <div class="container">

                    <div class=" hidden-xs hidden-sm col-md-3 text-center" style="color: grey;">
                        <h3>{{ $status_yesterday->Data }}</h3>

                        <br>

                        <div style="font-size: 25px;"> Abertura </div>
                        <div style="font-size: 25px;">  {{ $status_yesterday->Entrada1 }}
                            / {{ $status_yesterday->Entrada2 }}  </div>
                        <div style="font-size: 25px;"> R$ {{ $status_yesterday->ValorEntrada }},00</div>
                        <br>
                        <div style="font-size: 25px;"> Fechamento </div>
                        <div style="font-size: 25px;">    {{ $status_yesterday->Saida1 }}
                            / {{ $status_yesterday->Saida2 }}  </div>
                        <div style="font-size: 25px;"> R$ {{ $status_yesterday->ValorSaida }},00</div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-6 text-center">
                        <h3>{{$status_day->Data}}</h3>

                        <br>

                        <div style="font-size: 25px;">
                            @include($status_day->status_today)
                        </div>

                    </div>

                    <div class="hidden-xs hidden-sm col-md-3 text-center">
                        @include('costs')
                    </div>

                </div>
            </div>

        </div>

        <br><br><br>
    </div>


    <script>
        $('input#add').click(function () {
            var custo = $('input#newcost').val();
            var value = $('input#newvalue').val();
            $.ajax({
                url: '{{ url('/custos') }}',
                type: "POST",
                data: {
                    custo: custo,
                    value: value,
                    '_token': '{!! csrf_token() !!}'
                },
                success: function (result) {
                    window.location.reload(true);
                }
            });
        });
    </script>


@endsection