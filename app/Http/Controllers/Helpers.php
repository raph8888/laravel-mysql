<?php
namespace App\Http\Controllers;

use View;
use Session;
use DB;
use App\Acesso;

class Helpers extends Controller
{

    static function diadehoje()
    {

        $mes = date('M');
        $dia = date('d');
        $ano = date('Y');

        $mes_extenso = array(
            'Jan' => '01',
            'Feb' => '02',
            'Mar' => '03',
            'Apr' => '04',
            'May' => '05',
            'Jun' => '06',
            'Jul' => '07',
            'Aug' => '08',
            'Sep' => '09',
            'Oct' => '10',
            'Nov' => '11',
            'Dec' => '12'
        );

        $data = $dia . '/' . $mes_extenso["$mes"] . '/' . $ano;

        return $data;
    }

    static function findadmin()
    {
        $myusername = Session::get('user');
        $sqls = Acesso::where('Nome', '=', $myusername)->take(1)->get();
        foreach ($sqls as $sql) {
            $admin = $sql->UserAdmin;
        }

        if (isset($admin)) {

            return $admin;

        } else {

            $admin = null;
            return $admin;

        }
    }

    static function greeting()
    {
        $hr = date(" H ");
        if ($hr >= 12 && $hr < 18) {
            $resp = "Boa tarde";

        } else if ($hr >= 0 && $hr < 12) {
            $resp = "Bom dia";

        } else {
            $resp = "Boa noite";
        }

        return $resp;
    }

    static function return_status($status_day)
    {
        $status_day_open = $status_day->StatusEntrada;
        $status_day_close = $status_day->StatusSaida;

        if (!$status_day_open && !$status_day_close) {

            $status = 'status/status_open_close';

        } elseif ($status_day_open && !$status_day_close) {

            $status = 'status/status_close';

        } elseif ($status_day_open && $status_day_close) {

            $status = 'status/status_finished';

        } elseif (!$status_day_open && $status_day_close) {

            $status = 'status/status_open_blocked';

        } else {

            $status = 'Algo errado aconteceu, contate Rapha';

        }
        return $status;
    }

    static function clean_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
