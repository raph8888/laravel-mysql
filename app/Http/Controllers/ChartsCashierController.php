<?php
namespace App\Http\Controllers;

use View;
use DB;
use App\Custos;
use App\ControleCaixa;
use Session;

class ChartsCashierController extends Controller
{

    public function __construct()
    {
        View::share('path', url('/'));
    }


    /**
     * Show day status.
     *
     */
    public function index()
    {
        if (!Session::has('user')) {

            return view('acesso', ['situation' => 'No Session Values.']);

        } else {

            $entrada_count = DB::select("SELECT name, COUNT(*) AS count FROM(SELECT Entrada1 AS name FROM ControleCaixa UNION ALL SELECT Entrada2 AS name FROM ControleCaixa) x GROUP BY name", [1]);

            $each_row = array();
            foreach ($entrada_count as $entrada) {
                if ($entrada->name != null && !empty($entrada->name)) {
                    array_push($each_row, array('c' => array(array('v' => $entrada->name, 'f' => null), array('v' => $entrada->count, 'f' => null))));
                }
            }

            $returnArray = array('cols' => array(array('id' => '', 'label' => 'Aberturas', 'pattern' => '', 'type' => 'string'), array('id' => '', 'label' => 'Aberturas', 'pattern' => '', 'type' => 'number')), 'rows' => $each_row);



            echo json_encode($returnArray);

        }
    }

    //Adicionar Custos

    public function custos()
    {

        if (!empty($_POST['custo']) && !empty($_POST['value'])) {

            $data = Helpers::diadehoje();
            $newcost = $_REQUEST['custo'];
            $newvalue = $_REQUEST['value'];
            $user = new Custos;

            $user->Date = $data;

            $user->Description = $newcost;

            $user->Value = $newvalue;

            $user->save();
        } else {

            $resultado = "Nenhum valor de custo inserido.";
            return $resultado;
        }
    }


}
