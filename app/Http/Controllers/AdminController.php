<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use DB;
use App\Acesso;
use App\ControleCaixa;
use App\Calendar;
use App\Custos;

class AdminController extends Controller
{

    public function __construct()
    {
        View::share('path', url('/'));
    }

    /**
     * Returns Calendar, all Users and last 5 days rows of ControleCaixa table.
     *
     * @return Response
     */
    public function administrator(Request $request)
    {
        $admin = Helpers::findadmin();

        if (isset($admin) && $admin === 1) {

            //The administrador view


            //Get all users
            $acessos = Acesso::all();

            //Get last 5 rows.
            $controles = ControleCaixa::orderBy('IDda', 'desc')->take(10)->get();

            //Create calendar
            $calendar = new Calendar;
            return view('administrator',
                ['acessos' => $acessos,
                    'controles' => $controles,
                    'calendar' => $calendar]);

        } else {

            return redirect('/status');

        }

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function viewday()
    {
        if (isset($_POST['name'])) {

            $str = $_POST['name'];

            //$id = "li-19-10-2015";

            $dia = substr($str, 3, 2);  // returns "19"
            $mes = substr($str, 6, 2);  // returns "10"
            $ano = substr($str, 9, 4);  // returns "10"
            $dataid = $dia . "/" . $mes . "/" . $ano;

            $sql = DB::select('SELECT * FROM ControleCaixa WHERE Data="' . $dataid . '"');

            if (count($sql) === 1) {


                $controle = ControleCaixa::where('Data', '' . $dataid . '')->first();

                //This here returns an integer.
                $diatras = ControleCaixa::where('IDda', '<', $controle->IDda)->max('IDda');

                $yesterday = ControleCaixa::where('IDda', '' . $diatras . '')->first();


                $result =

                    "<h3 align='center'>" . $controle->Data . "</h3>

<table border='1' style='width:100%'>

      <thead align='left' style='display: table-header-group'>
      <tr>
      <th style='width:40%'>Abertura</th>
      <th style='width:30%'>Valor</th>
      <th style='width:30%'>Horário</th>
      </tr>
      </thead>

      <tbody>
      <td>" . $controle->Entrada1 . " / " . $controle->Entrada2 . "</td>
      <td><p>R$" . $controle->ValorEntrada . ",00*</p></td>
      <td>" . $controle->timeEntrada . "</td>
      </tbody>
</table>
<br>
<table border='1' style='width:100%'>
    <thead align='left' style='display: table-header-group'>
    <tr>
    <th style='width:40%'>Fechamento</th>
    <th style='width:30%'>Valor</th>
    <th style='width:30%'>Horário</th>
    </tr>
    </thead>

    <tbody>
    <td>" . $controle->Saida1 . " / " . $controle->Saida2 . " </td>
    <td><p>R$" . $controle->ValorSaida . ",00</p></td>
    <td>" . $controle->timeSaida . "</td></tr> </tbody>
</table>
<br><br>
<p>*Abertura do dia deve ser igual ao Fechamento do dia anterior </p>
<table border='1' style='width:100%'>

      <thead align='left' style='display: table-header-group'>
      <tr>
      <th style='width:40%'>Fechamento do dia anterior</th>
      <th style='width:30%'>Abertura do dia</th>
      <th style='width:30%'>Diferença</th>
      </tr>
      </thead>

      <tbody>


       <td>R$ " . $yesterday->ValorSaida . ",00</td>
      <td><p>R$ " . $controle->ValorEntrada . ",00</p></td>
      <td style='color:red'>R$ " . abs($controle->ValorEntrada - $yesterday->ValorSaida) . ",00</td>
      </tbody>
</table>";

                return $result;

            } else {

                $result = "<h3 align='center'>" . $dataid . "</h3>
                <br>
                <p>Não há dados para esta data. Tente outra.</p>";

                return $result;
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (isset($_POST['newuser']) && isset($_POST['newpass'])) {

            $newuser = $_REQUEST['newuser'];
            $newpass = $_REQUEST['newpass'];


            $user = new Acesso;

            $user->Nome = $newuser;

            $user->Senha = $newpass;

            if (isset($_POST['newadmin'])) {

                $newadmin = $_REQUEST['newadmin'];

                $user->UserAdmin = $newadmin;
            }

            $user->save();

            $resultado = "Novo acesso criado com sucesso";

            return redirect('/admin');
        } else {

            return view('adduser');
        }
    }


    public function allcosts()
    {

        $custos = Custos::orderBy('id', 'desc')->get();
        return view('allcosts',
            ['custos' => $custos]);


    }

    public function alldays()
    {

        $controles = ControleCaixa::orderBy('IDda', 'desc')->get();
        return view('alldays',
            ['controles' => $controles]);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($name)
    {
        return view('edituser', array('name' => $name));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($name)
    {
        $controles = Acesso::where('Nome', $name)->take(1)->delete();

        return redirect('/admin');

    }

}
