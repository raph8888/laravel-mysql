@extends('layouts.master2')
@section('content')

    <br>
    <br>

    <div class="text-center status-container">
        <div class=" hidden-xs hidden-sm col-md-4 text-center" style="color: grey;">
            <h2>Caixa Fechado</h2>
            <h4>({{ $status_yesterday->Data }})</h4>

            <br>

            <div style="font-size: 25px;"> Abertura</div>
            <div style="font-size: 25px;">  {{ $status_yesterday->Entrada1 }}
                / {{ $status_yesterday->Entrada2 }}  </div>
            <div style="font-size: 25px;"> R$ {{ $status_yesterday->ValorEntrada }},00</div>
            <br>
            <div style="font-size: 25px;"> Fechamento</div>
            <div style="font-size: 25px;">    {{ $status_yesterday->Saida1 }}
                / {{ $status_yesterday->Saida2 }}  </div>
            <div style="font-size: 25px;"> R$ {{ $status_yesterday->ValorSaida }},00</div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 text-center">
            <h2>Caixa Aberto</h2>
            <h4>({{$status_day->Data}})</h4>

            <br>
            <br>

            <div style="font-size: 25px;">
                @include($status_day->status_today)
            </div>

        </div>
        <br><br><br>
    </div>

@endsection