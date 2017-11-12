    <div class="container-flex">

        <div class="col-xs-12 col-sm-12 col-md-12 abertura_status">
            <div class="abertura">
                <p style="color: #33CC33">Abertura do caixa executada,
                    <br>
                    obrigada {{$status_day->Entrada1}} e {{$status_day->Entrada2}}.</p>
            </div>
        </div>

        <br>
        <br>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="fechamento">
                <p style="color: #ff0000">Fechamento do Caixa Pendente<br>
                    <a href= {{ url('/inserirsaida') }} >Executar Fechamento</a></p>
            </div>
        </div>

    </div>

<style>

    .abertura_status {
        padding-bottom: 30px;
    }

</style>