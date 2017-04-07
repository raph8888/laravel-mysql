<?php
namespace App\Http\Controllers;

use App\ControleCaixa;
use Illuminate\Http\Request;
use View;
use DB;
use Session;

class MainPageController extends Controller
{

    public function __construct()
    {
        $controle = ControleCaixa::orderBy('IDda', 'desc')->get();

        foreach ($controle as $cont) {

            $table_date = str_replace("/","-",$cont->Data);
            $timestamp = strtotime(str_replace("/","-",$cont->Data));

            $flight = ControleCaixa::find($cont->IDda);
            $flight->created_at = $timestamp;
            $flight->save();

        }

        View::share('path', url('/'));
    }

    /**
     * Display main view.
     */
    public function index(Request $request)
    {
        return view('services');
    }

    /**
     * Display contact view.
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Display address view.
     */
    public function address()
    {
        return view('address');
    }

    /**
     * Authenticates user
     * Takes care of the logic of adding the date if it's first login of the day.
     * Display access view.
     */
    public function access()
    {

        if (isset($_POST['user']) && isset($_POST['pass'])) {

            $username = $_REQUEST['user'];
            $password = $_REQUEST['pass'];

            $user = DB::table('Acesso')->where('Nome', $username)->where('Senha', $password)->first();

            if ($user) {

                Session::put('user', $username);

                $day_has_row = DB::table('ControleCaixa')->where('Data', Helpers::diadehoje())->first();

                if (!$day_has_row) {

                    $new_day = new ControleCaixa;
                    $new_day->Data = Helpers::diadehoje();
                    $new_day->save();

                }

                return redirect('status');

            } else {

                return view('access', ['situation' => 'Dados de Acesso incorretos.']);

            }

        } else {

            return view('access');

        }
    }
}
