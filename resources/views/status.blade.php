@extends('layouts.master2')
@section('content')

    <br>
    <br>

    <img src="images/note-book.png" class="note-pad-img"/>
    <div class="status-container status-container-background">

        {{-- BOOK 1ST PAGE - PREVIOUS DAY--}}
        <div class=" hidden-xs hidden-sm col-md-4" style="color: #6e798d;">

            <div class="status-title text-center">
                <h2>Caixa Prévio</h2>
                <h4>({{ $status_yesterday->Data }})</h4>
            </div>

            <br>

            <div class="status-info text-align-left">

                {{--SHOW OPENING STATUS OF PREVIOUS DAY--}}
                <h3 style="display: inline;">Abertura:</h3>
                @if ($status_yesterday->ValorEntrada)
                    <h4 style="color: #33CC33; display: inline">Executada</h4>
                    <br>
                    <h4>- {{ $status_yesterday->Entrada1 }} / {{ $status_yesterday->Entrada2 }}  </h4>
                    <h4>- R$ {{ $status_yesterday->ValorEntrada }},00</h4>
                @else
                    <h4 style="color: #ff0000;">Pendente</h4>
                @endif

                <br>
                {{--SHOW CLOSING STATUS OF PREVIOUS DAY--}}

                <h3 style="display: inline;">Fechamento:</h3>
                @if ($status_yesterday->ValorSaida)
                    <h4 style="color: #33CC33; display: inline">Executado</h4>
                    <br>
                    <h4>- {{ $status_yesterday->Saida1 }} / {{ $status_yesterday->Saida2 }}</h4>
                    <h4>- R$ {{ $status_yesterday->ValorSaida }},00</h4>
                @else
                    <h4 style="color: #ff0000">Pendente</h4>
                @endif
            </div>
        </div>

        {{--SPACE FOR PAGE DIVISION BETWEEN PREVIOUS AND CURRENT DAY--}}
        <div class="col-xs-12 col-sm-12 col-md-2">
        </div>

        {{-- BOOK 2ND PAGE - CURRENT DAY--}}
        <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="status-title text-center">
                @if ($status_day->ValorSaida)
                    <h2>Caixa Fechado</h2>
                @else
                    <h2>Caixa Aberto</h2>
                @endif
                <h4>({{$status_day->Data}})</h4>
            </div>

            <br>

            <div class="status-info text-align-left">

                {{--OPENING STATUS OF CURRENT DAY--}}
                <div class="abertura">
                    <h3 style="display: inline;">Abertura:</h3>
                    @if ($status_day->ValorEntrada)
                        <h4 style="color: #33CC33; display: inline">Executada</h4>
                        <br>
                        <h4 style="color: #33CC33">Obrigada {{$status_day->Entrada1}} e {{$status_day->Entrada2}}!</h4>
                    @elseif (!$status_day->ValorEntrada && $status_day->ValorSaida)
                        <h4 style="color: #ff0000; display: inline">Bloqueada</h4>
                        <br>
                        <h4 style="color: #ff0000">Fechamento executado.</h4>
                    @else
                        <h4 style="color: #ff0000; display: inline">Pendente</h4>
                        <br>
                        <br>
                        <a href= {{url('/inserirentrada')}} >
                            <span class="btn btn-primary btn-md" style="color: white; font-size: 15px;">Executar Abertura</span>
                        </a>
                    @endif
                </div>

                <br>
                <br>

                {{--SHOW CLOSING STATUS OF CURRENT DAY--}}
                <div class="fechamento">
                    <h3 style="display: inline;">Fechamento:</h3>
                    @if ($status_day->ValorSaida)
                        <h4 style="color: #33CC33; display: inline">Executado</h4>
                        <br>
                        <h4 style="color: #33CC33;">Obrigada {{$status_day->Saida1}} e {{$status_day->Saida2}}!</h4>
                    @else
                        <h4 style="color: #ff0000; display: inline;">Pendente</h4>
                        <br>
                        <br>
                        <a href= {{url('/inserirsaida')}} >
                            <span class="btn btn-primary btn-md" style="color: white; font-size: 15px;">Executar Fechamento</span>
                        </a>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection