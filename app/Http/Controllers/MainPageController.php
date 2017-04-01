<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use DB;
use Session;

class MainPageController extends Controller
{

    public function __construct()
    {
        View::share('path', url('/'));
    }

    /**
     * Display main view.
     */
    public function index(Request $request)
    {
        return view('mainpage');
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

            $myusername = $_REQUEST['user'];
            $mypassword = $_REQUEST['pass'];

            $users = DB::select("SELECT * FROM Acesso WHERE Nome='$myusername' and Senha='$mypassword'");

            if (count($users) === 1) {

                Session::put('user', $myusername);

                $checkdate = DB::select('SELECT * FROM ControleCaixa WHERE Data="' . Helpers::diadehoje() . '"');

                if (count($checkdate) === 1) {

                    return redirect('status');

                } else {

                    DB::select('INSERT INTO ControleCaixa (Data) VALUES ("' . Helpers::diadehoje() . '")');

                    return redirect('status');
                }

            } else {

                return view('access', ['situation' => 'Dados de Acesso incorretos.']);
            }

        } else {

            return view('access');
        }
    }
}
