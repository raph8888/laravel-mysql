<?php
namespace App\Http\Controllers;

use App\ControleCaixa;
use App\Acesso;
use Illuminate\Http\Request;
use View;
use DB;
use Session;
use League\Flysystem\Exception;

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

            $username = Helpers::clean_input($_POST['user']);
            $password = Helpers::clean_input($_POST['pass']);

            try {
                $user = Acesso::where('Nome', $username)->where('Senha', $password)->first();
                if (!$user) {
                    throw new Exception('Dados de acesso incorretos');
                }
            } catch (Exception $e) {
                return view('access', ['error' => $e->getMessage()]);
            }

            Session::put('user', $username);

            MainPageController::insertDay();

            return redirect('status');

        } else {
            return view('access');
        }
    }

    public function insertDay()
    {
        $day_has_row = ControleCaixa::where('Data', Helpers::diadehoje())->first();

        if (!$day_has_row) {
            $new_day = new ControleCaixa;
            $new_day->Data = Helpers::diadehoje();
            $new_day->created_at = time();
            $new_day->save();
        }
    }
}
