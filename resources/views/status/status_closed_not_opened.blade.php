    <div class="container-flex">

        <div class="col-xs-12 col-sm-12 col-md-12 abertura_status">
            <div class="abertura">
                <p style="color: #ff0000">Abertura do caixa bloqueada.<br></p>
            </div>
        </div>

        <br>
        <br>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="fechamento">
                <p style="color: #33CC33">Fechamento do caixa executado,
                    <br>
                    obrigada {{$status_day->Saida1}} e {{$status_day->Saida2}}.</p>
            </div>
        </div>

    </div>

<style>

    .abertura_status {
        padding-bottom: 30px;
    }

</style>