<?php
namespace App\Http\Controllers;

use View;
use DB;
use App\Custos;
use App\ControleCaixa;
use Session;

class ChartsSaidaCashierController extends Controller
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


            $saida_count = DB::select("SELECT name, COUNT(*) AS count FROM(SELECT Saida1 AS name FROM ControleCaixa UNION ALL SELECT Saida2 AS name FROM ControleCaixa) x GROUP BY name", [1]);

            $saida_each_row = array();
            foreach ($saida_count as $saida) {
                if ($saida->name != null && !empty($saida->name)) {
                    array_push($saida_each_row, array('c' => array(array('v' => $saida->name, 'f' => null), array('v' => $saida->count, 'f' => null))));
                }
            }

            $saidaReturnArray = array('cols' => array(array('id' => '', 'label' => 'Fechamentos', 'pattern' => '', 'type' => 'string'), array('id' => '', 'label' => 'Fechamentos', 'pattern' => '', 'type' => 'number')), 'rows' => $saida_each_row);



            echo json_encode($saidaReturnArray);

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
