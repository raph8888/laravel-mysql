<?php
namespace App\Http\Controllers;

use View;
use DB;
use App\Custos;
use App\ControleCaixa;
use Session;

class StatusController extends Controller
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
    public function status()
    {
        if (!Session::has('user')) {

            return view('acesso', ['situation' => 'No Session Values.']);

        } else {

            //Get current day status
            $current_day = ControleCaixa::where('Data', Helpers::diadehoje())->first();
            $status_today = Helpers::return_status($current_day);
            $current_day->status_today = $status_today;

            //Get previous day status
            $previous_id = ControleCaixa::where('IDda', '<', $current_day->IDda)->max('IDda');
            $previous_day = ControleCaixa::where('IDda', $previous_id)->first();
            $status_yesterday = Helpers::return_status($previous_day);
            $previous_day->status_yesterday = $status_yesterday;

            //Get list of costs
            $custos = Custos::where('Date', Helpers::diadehoje())->get();

            //Get username from Session???
            $myusername = Session::get('user');

            //Check if it is admin
            $is_admin = Helpers::findadmin();

            return view('status',
                ['data' => Helpers::diadehoje(),
                    'greetings' => Helpers::greeting() . ' ' . $myusername,
                    'status_day' => $current_day,
                    'status_yesterday' => $previous_day,
                    'custos' => $custos,
                    'is_admin' => $is_admin]);
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
