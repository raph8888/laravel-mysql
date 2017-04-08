<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use DB;
use App\Acesso;
use App\ControleCaixa;
use App\Custos;
use Session;

class CashierInsertController extends Controller
{

    public function __construct()
    {
        View::share('path', url('/'));
    }

    public function inserirentrada()
    {

        $status_open_day = ControleCaixa::where('Data', Helpers::diadehoje())->where('StatusEntrada', 0)->first();

        if ($status_open_day) {

            date_default_timezone_set("Brazil/East");

            if (isset($_POST['user1']) && isset($_POST['pass1']) && isset($_POST['valorentrada'])) {

                $user1 = $_REQUEST['user1'];
                $user2 = $_REQUEST['user2'];
                $pass1 = $_REQUEST['pass1'];
                $pass2 = $_REQUEST['pass2'];
                $valorentrada = $_REQUEST['valorentrada'];
                $horas = date("h:i:sa");

                $first_access = Acesso::where('Nome', $user1)->where('Senha', $pass1)->first();
                $second_access = Acesso::where('Nome', $user2)->where('Senha', $pass2)->first();

                if ($first_access && $second_access) {

                    $status_open_day->Entrada1 = $user1;
                    $status_open_day->Entrada2 = $user2;
                    $status_open_day->ValorEntrada = $valorentrada;
                    $status_open_day->timeEntrada = $horas;
                    $status_open_day->StatusEntrada = 1;

                    $status_open_day->save();


//                        $to = "[\"+5538991926473\"]";
//
//                        $message = "O Caixa foi aberto hoje as " . $horas . " por " . $user1 . " e " . $user2 . " Valor do Caixa no momento de abertura: R$ " . $valorentrada;
//
//                        $authToken = "7Za3W2ZlRhiLywZraszuIw==";
//
//
//                        $ch = curl_init();
//
//
//                        curl_setopt($ch, CURLOPT_URL, "https://api.clickatell.com/rest/message");
//
//                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//
//                        curl_setopt($ch, CURLOPT_POST, 1);
//
//                        curl_setopt($ch, CURLOPT_VERBOSE, 1);
//
//                        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"text\":\"$message\",\"to\":$to}");
//
//                        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//
//                            "X-Version: 1",
//
//                            "Content-Type: application/json",
//
//                            "Accept: application/json",
//
//                            "Authorization: Bearer $authToken"
//
//                        ));
//
//                        $result = curl_exec($ch);
//
//                        curl_close($ch);

                    return redirect('/status');

                } else {

                    echo "Nome ou Senha de Acesso Incorretos.";
                    return view('inserirentrada');
                }

            } else {
                return view('inserirentrada');
            }

        } else {

            $mensagem = "O Caixa ja foi aberto hoje. Até a próxima!";

            return view('errors',
                ['mensagem' => $mensagem]);

        }
    }


    public function inserirsaida()
    {

        $status_close_day = ControleCaixa::where('Data', Helpers::diadehoje())->where('StatusSaida', 0)->first();

        if ($status_close_day) {
            date_default_timezone_set("Brazil/East");
            if (isset($_POST['user1']) && isset($_POST['pass1']) && isset($_POST['valorsaida'])) {
                $user1 = $_REQUEST['user1'];
                $pass1 = $_REQUEST['pass1'];
                $user2 = $_REQUEST['user2'];
                $pass2 = $_REQUEST['pass2'];
                $valorsaida = $_REQUEST['valorsaida'];
                $horas = date("h:i:sa");

                $first_access = Acesso::where('Nome', $user1)->where('Senha', $pass1)->first();
                $second_access = Acesso::where('Nome', $user2)->where('Senha', $pass2)->first();

                if ($first_access && $second_access) {

                    $status_close_day->Saida1 = $user1;
                    $status_close_day->Saida2 = $user2;
                    $status_close_day->ValorSaida = $valorsaida;
                    $status_close_day->timeSaida = $horas;
                    $status_close_day->StatusSaida = 1;

                    $status_close_day->save();

//                        $to = "[\"+5538991926473\"]";
//
//                        $message = "O Caixa foi fechado hoje as " . $horas . " por " . $user1 . " e " . $user2 . " Valor do Caixa no momento de fechamento: R$ " . $valorsaida;
//
//                        $authToken = "7Za3W2ZlRhiLywZraszuIw==";
//
//
//                        $ch = curl_init();
//
//
//                        curl_setopt($ch, CURLOPT_URL, "https://api.clickatell.com/rest/message");
//
//                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//
//                        curl_setopt($ch, CURLOPT_POST, 1);
//
//                        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"text\":\"$message\",\"to\":$to}");
//
//                        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//
//                            "X-Version: 1",
//
//                            "Content-Type: application/json",
//
//                            "Accept: application/json",
//
//                            "Authorization: Bearer $authToken"
//
//                        ));
//
//                        $result = curl_exec($ch);

                    return redirect('/status');

                } else {

                    echo "Nome ou Senha de Acesso Incorretos.";
                    return view('inserirsaida');
                }

            } else {
                return view('inserirsaida');
            }
        } else {

            $mensagem = "O Caixa ja foi fechado hoje. Até a próxima!";

            return view('errors',
                ['mensagem' => $mensagem]);

        }
    }
}
