@extends('layouts.master2')
@section('content')

    <div class="text-center">
        <div class="col-md-6 col-sm-6 col-xs-6" style="border-bottom: 2px solid #81afcd; border-left: 2px solid #81afcd; border-right: 2px solid #81afcd;
    padding-bottom: 20px;
    padding-top: 47px; margin: 50px 0px 0px 200px;">
            <img src="images/torn-paper.png" width="100%" height="80px" style="position: absolute;
    top: -22px;
    left: 0px;">

            <h3>Despesas do dia</h3>
            <table align="left" class="cost-table" style="width:100%">
                <thead align="left" style="display: table-header-group">
                <tr>
                    <th>Descrição</th>
                    <th>Valor</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $total = 0;
                if ($custos) {
                    foreach ($custos as $custo) {

                        echo "<tr align='left' class='item_row'>";

                        echo "<td> " . $custo['Description'] . " </td>
                <td><p>R$ " . $custo['Value'] . " </p></td>";

                        $total += $custo['Value'];
                    }
                } else {
                    echo "<tr align='left' class='item_row'><td> Ainda não há registro de custos</td>
                <td><p>R$ 00.00 </p></td>";

                }

                ?>

                <tr align='left'>
                    <td><b>Total</b></td>
                    <td> <?php
                        if ($custos) {
                            echo "R$ " . $total;
                        } else {
                            echo "R$ 00.00";
                        }
                        ?>
                    </td>
                </tr>

                </tbody>
            </table>

            <div class="include-cost-div" style="position: relative;
    display: inline-block;
    margin-top: 20px;
    margin-bottom: 20px;">
                <p>Incluir Despesa</p>

                <input type="text" name="newcost" id="newcost" placeholder="Descrição" style="width: 40%;
    display: inline;" required>
                <input type="number" name="newvalue" id="newvalue" placeholder="Valor" step="0.01" min="0.01"
                       max="99" style="width: 40%;
    display: inline;" required/>
                <br>
                <br>
                <input type="submit" name="add" class="add" id="add" value="Adicionar (+)">
            </div>

            {!! isset($resultado) ? $resultado : null !!}

        </div>
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