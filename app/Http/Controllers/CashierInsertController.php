<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use View;

use DB;
use App\Acesso;
use App\ControleCaixa;
use App\Custos;
//use Illuminate\Http\Request;
//use App\Http\Requests;
//use App\Http\Controllers\Controller;
//use App\Clickatell;
//use App\Clickatell\TransportInterface;

use Session;

class CashierInsertController extends Controller
{

    public function __construct() {
        View::share ( 'path', url('/') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function inserirentrada()
    {

        $checkdate = DB::select('SELECT * FROM ControleCaixa WHERE Data="' . Helpers::diadehoje() . '" AND StatusEntrada=0');

        if (count($checkdate) === 1) {
            date_default_timezone_set("Brazil/East");
            if (isset($_POST['user1']) && isset($_POST['pass1']) && isset($_POST['valorentrada'])) {
                $user1 = $_REQUEST['user1'];
                $pass1 = $_REQUEST['pass1'];
                $user2 = $_REQUEST['user2'];
                $pass2 = $_REQUEST['pass2'];
                $valorentrada = $_REQUEST['valorentrada'];
                $horas = date("h:i:sa");

                $sql = DB::select('SELECT * FROM Acesso WHERE Nome="' . $user1 . '" AND Senha="' . $pass1 . '"');

                if (count($sql) === 1) {

                    $sql = DB::select('SELECT * FROM Acesso WHERE Nome="' . $user2 . '" AND Senha="' . $pass2 . '"');

                    if (count($sql) === 1) {
                        $sql = DB::select('UPDATE ControleCaixa SET Entrada1="' . $user1 . '", Entrada2="' . $user2 . '", ValorEntrada="' . $valorentrada . '", timeEntrada="' . $horas . '", StatusEntrada = "1" WHERE Data ="' . Helpers::diadehoje() . '"');

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

                        echo "Nome2 ou Senha2 de Acesso Incorretos.";
                        return view('inserirentrada');
                    }
                } else {

                    echo "Nome1 ou Senha1 de Acesso Incorretos.";
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

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function inserirsaida()
    {

        $checkdate = DB::select('SELECT * FROM ControleCaixa WHERE Data="' . Helpers::diadehoje() . '" AND StatusSaida=0');

        if (count($checkdate) === 1) {
            date_default_timezone_set("Brazil/East");
            if (isset($_POST['user1']) && isset($_POST['pass1']) && isset($_POST['valorsaida'])) {
                $user1 = $_REQUEST['user1'];
                $pass1 = $_REQUEST['pass1'];
                $user2 = $_REQUEST['user2'];
                $pass2 = $_REQUEST['pass2'];
                $valorsaida = $_REQUEST['valorsaida'];
                $horas = date("h:i:sa");

                $sql = DB::select('SELECT * FROM Acesso WHERE Nome="' . $user1 . '" AND Senha="' . $pass1 . '"');

                if (count($sql) === 1) {

                    $sql = DB::select('SELECT * FROM Acesso WHERE Nome="' . $user2 . '" AND Senha="' . $pass2 . '"');

                    if (count($sql) === 1) {
                        $sql = DB::select('UPDATE ControleCaixa SET Saida1="' . $user1 . '", Saida2="' . $user2 . '", ValorSaida="' . $valorsaida . '", timeSaida="' . $horas . '", StatusSaida = "1" WHERE Data ="' . Helpers::diadehoje() . '"');

                        $to = "[\"+5538991926473\"]";

                        $message = "O Caixa foi fechado hoje as " . $horas . " por " . $user1 . " e " . $user2 . " Valor do Caixa no momento de fechamento: R$ " . $valorsaida;

                        $authToken = "7Za3W2ZlRhiLywZraszuIw==";


                        $ch = curl_init();


                        curl_setopt($ch, CURLOPT_URL, "https://api.clickatell.com/rest/message");

                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                        curl_setopt($ch, CURLOPT_POST, 1);

                        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"text\":\"$message\",\"to\":$to}");

                        curl_setopt($ch, CURLOPT_HTTPHEADER, array(

                            "X-Version: 1",

                            "Content-Type: application/json",

                            "Accept: application/json",

                            "Authorization: Bearer $authToken"

                        ));

                        $result = curl_exec($ch);

                        return redirect('/status');
                    } else {

                        echo "Nome2 ou Senha2 de Acesso Incorretos.";
                        return view('inserirsaida');
                    }
                } else {

                    echo "Nome1 ou Senha1 de Acesso Incorretos.";
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
