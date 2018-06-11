<?php
namespace App\Http\Controllers;

use View;
use DB;
use App\Custos;
use App\Acesso;
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


            if(!empty($_GET['start']) && !empty($_GET['end'])){
                $start = strtotime($_GET['start']);
                $end = strtotime($_GET['end']);

                $saida_count = DB::select("SELECT name, COUNT(*) AS count FROM(SELECT Saida1 AS name, created_at as ts FROM ControleCaixa UNION ALL SELECT Saida2 AS name, created_at as ts FROM ControleCaixa) x WHERE ts BETWEEN $start AND $end GROUP BY name", [1]);
            } else {
                $saida_count = DB::select("SELECT name, COUNT(*) AS count FROM(SELECT Saida1 AS name FROM ControleCaixa UNION ALL SELECT Saida2 AS name FROM ControleCaixa) x GROUP BY name", [1]);
            }

            //Get all users
            $acessos = Acesso::all();

            $names = array();

            foreach ($acessos as $acesso){
                array_push($names, $acesso->Nome);
            }

            $saida_each_row = array();
            foreach ($saida_count as $saida) {
                if ($saida->name != null && !empty($saida->name) && in_array(strtolower($saida->name), array_map('strtolower', $names))) {
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
