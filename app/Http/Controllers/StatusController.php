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
     * @return Response
     */
    public function status()
    {
        if (!Session::has('user')) {

            return view('acesso', ['situation' => 'No Session Values.']);

        } else {

            $status_day = ControleCaixa::where('Data', Helpers::diadehoje())->first();
            $status_day_open = $status_day->StatusEntrada;
            $status_day_close = $status_day->StatusSaida;
            $status_today = Helpers::return_status($status_day_open, $status_day_close);
            $status_day->status_today = $status_today;


            $previous_id = ControleCaixa::where('IDda', '<', $status_day->IDda)->max('IDda');
            $previous_day = ControleCaixa::where('IDda', $previous_id)->first();
            $status_yesterday_open = $previous_day->StatusEntrada;
            $status_yesterday_close = $previous_day->StatusSaida;
            $status_yesterday = Helpers::return_status($status_yesterday_open, $status_yesterday_close);
            $previous_day->status_yesterday = $status_yesterday;

            ////Display list of costs
            $custos = Custos::where('Date', Helpers::diadehoje())->get();

            $myusername = Session::get('user');

            $admin = Helpers::findadmin();

            if ($admin === 1) {

                $greeting = '<a href=' . url('/admin') . '>Clique aqui para Analisar Tabelas</a>';

            } else {

                $greeting = "";
            }

            return view('status',

                ['data' => Helpers::diadehoje(),
                    'situation' => Helpers::greeting() . ' ' . $myusername . ': )',
                    'greeting' => $greeting,
                    'status_day' => $status_day,
                    'status_yesterday' => $previous_day,
                    'custos' => $custos]);

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
