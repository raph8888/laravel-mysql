<?php
namespace App\Http\Controllers;

use View;
use Session;
use DB;
use App\Acesso;

class Helpers extends Controller
{

    public function __construct()
    {
        View::share('path', url('/'));
    }


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

}
