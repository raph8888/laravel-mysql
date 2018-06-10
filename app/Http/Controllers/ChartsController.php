<?php
namespace App\Http\Controllers;

use View;
use DB;
use App\Custos;
use App\ControleCaixa;
use Session;

class ChartsController extends Controller
{

    public function __construct()
    {
        View::share('path', url('/'));
    }


    /**
     * Show day status.
     *
     * @return View
     */
    public function index()
    {
        if (!Session::has('user')) {

            return view('acesso', ['situation' => 'No Session Values.']);

        } else {


            //Get username from Session???
            $myusername = Session::get('user');

            //Check if it is admin
            $is_admin = Helpers::findadmin();

            return view('charts',
                ['data' => Helpers::diadehoje(),
                    'greetings' => Helpers::greeting() . ' ' . $myusername
                ]);
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
