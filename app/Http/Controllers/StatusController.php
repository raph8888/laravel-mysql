<?php
namespace App\Http\Controllers;

use View;
use DB;
use App\Custos;
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

            $hr = date(" H ");
            if ($hr >= 12 && $hr < 18) {
                $resp = "Boa tarde";

            } else if ($hr >= 0 && $hr < 12) {
                $resp = "Bom dia";

            } else {
                $resp = "Boa noite";
            }

            $statusentrada = DB::table('ControleCaixa')->where('Data', Helpers::diadehoje())->pluck('StatusEntrada');
            $statussaida = DB::table('ControleCaixa')->where('Data', Helpers::diadehoje())->pluck('StatusSaida');

            if ($statusentrada[0] === 0 && $statussaida[0] === 0) {

                $status = 'status/status_open_close';

            } else {

                if ($statusentrada[0] === 1 && $statussaida[0] === 0) {

                    $status = 'status/status_close';

                } else {

                    if ($statusentrada[0] === 1 && $statussaida[0] === 1) {

                        $status = 'status/status_finished';


                    } else {

                        if ($statusentrada[0] === 0 && $statussaida[0] === 1) {

                            $status = 'status/status_open_blocked';

                        } else {
                            $status = 'Algo errado aconteceu, contate Rapha';
                        }
                    }
                }
            }

            ////Display list of costs
            $custos = Custos::where('Date', '=', Helpers::diadehoje())->get();

            $myusername = Session::get('user');

            $admin = Helpers::findadmin();

            if ($admin === 1) {

                $greeting = '<a href=' . url('/admin') . '>Clique aqui para Analisar Tabelas</a>';

            } else {

                $greeting = "";
            }

            return view('status',

                ['data' => Helpers::diadehoje(),
                    'situation' => $resp . ' ' . $myusername . ',',
                    'greeting' => $greeting,
                    'status' => $status,
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
