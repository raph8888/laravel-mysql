<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use View;

class MainPageController extends Controller
{

    public function __construct() {
        View::share ( 'path', url('/') );
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
     * Display acesso view.
     */
    public function access()
    {

        if (isset($_POST['user']) && isset($_POST['pass'])) {

            $myusername = $_REQUEST['user'];
            $mypassword = $_REQUEST['pass'];

            $users = DB::select("SELECT * FROM Acesso WHERE Nome='$myusername' and Senha='$mypassword'");

            if (count($users) === 1) {

                Session::put('user', $myusername);

                $checkdate = DB::select('SELECT * FROM ControleCaixa WHERE Data="' . $this->diadehoje() . '"');

                if (count($checkdate) === 1) {

                    return $this->status();

                } else {

                    //!! Muito Importante -- Inserting date into database !!//

                    $checkdate = DB::select('INSERT INTO ControleCaixa (Data)
                VALUES ("' . $this->diadehoje() . '")');

                    return $this->status();
                }

            } else {

                return view('acesso', ['situation' => 'Dados de Acesso incorretos.']);
            }
        } else {

            return view('access');
        }
    }

}
