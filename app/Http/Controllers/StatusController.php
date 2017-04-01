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

                $status = '
        <table align="center">
        <tr>
        <td>
            <div class="abertura">
                <p style="color: #ff0000">Abertura do Caixa Pendente<br>
                    <a href=' . url('/inserirentrada') . '>Executar Abertura</a></p>
            </div>
        </td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td>
            <div class="fechamento">
                <p style="color: #ff0000">Fechamento do Caixa Pendente<br>
                    <a href=' . url('/inserirsaida') . '>Executar Fechamento</a></p>
            </div>
        </td>
        </tr>
        </table> ';

            } else {

                if ($statusentrada[0] === 1 && $statussaida[0] === 0) {

                    $status = '

        <table align="center">
        <tr>
        <td>
            <div class="abertura">
                <p style="color: #33CC33">Abertura do Caixa Executada<br>Obrigado</p>
            </div>
        </td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td>
            <div class="fechamento">
                <p style="color: #ff0000">Fechamento do Caixa Pendente<br>
                    <a href=' . url('/inserirsaida') . '>Executar Fechamento</a></p>
            </div>
        </td>
        </tr>
        </table> ';


                } else {

                    if ($statusentrada[0] === 1 && $statussaida[0] === 1) {

                        $status = '

             <table align="center">
        <tr>
        <td>
            <div class="abertura">
                <p style="color: #33CC33">Abertura do Caixa Executada<br>Obrigado</p>
            </div>
        </td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td>
            <div class="fechamento">
                <p style="color: #33CC33">Fechamento do Caixa Executado<br>Obrigado</p>
            </div>
        </td>
        </tr>
        </table> ';

                    } else {

                        if ($statusentrada[0] === 0 && $statussaida[0] === 1) {

                            $status = '

        <table align="center">
        <tr>
        <td>
            <div class="abertura">
                <p style="color: #ff0000">Abertura do Caixa Bloqueada<br></p>
            </div>
        </td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td>
            <div class="fechamento">
                <p style="color: #33CC33">Fechamento do Caixa Executado<br>Obrigado</p>
            </div>
        </td>
        </tr>
        </table> ';

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

                $greeting = '<a href="http://copiadoramoc.com/public/administrador">Clique aqui para Analisar Tabelas</a>';

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
}
