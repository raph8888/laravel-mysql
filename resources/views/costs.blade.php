<div class="row">

    <div class="container-flex">
        <div class="col-md-12 col-sm-12 col-xs-12" style="border-bottom: 2px solid #81afcd; border-left: 2px solid #81afcd; border-right: 2px solid #81afcd;
    padding-bottom: 20px;
    padding-top: 47px;">
            <img src="images/torn-paper.png" width="100%" height="80px" style="position: absolute;
    top: -22px;
    left: 0px;">

            <h3>Despesas do dia</h3>
            <table class="cost-table" style="width:100%">
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

                        echo "<tr class='item_row'>";

                        echo "<td> " . $custo['Description'] . " </td>
                <td><p>R$ " . $custo['Value'] . " </p></td>";

                        $total += $custo['Value'];
                    }
                } else {
                    echo "<tr class='item_row'><td> Ainda não há registro de custos</td>
                <td><p>R$ 00.00 </p></td>";

                }

                ?>

                <tr>
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

            <br>


            <div class="include-cost-div" style="float:right; width: 33%; padding-top: 20px;">
                <p>Incluir Despesa</p>

                <input type="text" name="newcost" id="newcost" placeholder="Descrição" style="width: 98%;" required>
                <br>
                <br>
                <input type="number" name="newvalue" id="newvalue" placeholder="Valor" step="0.01" min="0.01"
                       max="99" style="width: 98%;" required/>
                <br>
                <br>
                <input type="submit" name="add" class="add" id="add" value="Adicionar (+)" style="float:right;">
            </div>

            <br>
            <br>

            {!! isset($resultado) ? $resultado : null !!}

        </div>

    </div>

</div>