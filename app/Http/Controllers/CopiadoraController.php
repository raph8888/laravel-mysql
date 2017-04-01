<?php
namespace App\Http\Controllers;
use View;

class CopiadoraController extends Controller
{

    public function __construct() {
        View::share ( 'path', url('/') );
    }

    public function sair()
    {
        Session::flush();
        return view('copiadora');

    }

//    public function errors(Request $request, $mensagem = "Nao ha mensagens")
//    {
//
//        Session::forget('user');
//
//        $data = $request->session()->all();
//
//        $pathname = $request->path();
//        $urlname = $request->url();
//
//        if ($request->isMethod('post')) {
//            echo $name;
//
//        } else {
//            echo "<hr>";
//        }
//        return view('errors', [
//
//            'mensagem' => $mensagem,
//            'pathname' => $pathname,
//            'urlname' => $urlname,
//            'data' => $data
//
//        ]);
//
//    }

    //Clear Sessions

}
