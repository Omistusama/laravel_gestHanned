<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = array();
            for($i = 0; $i<7; $i++) {
                $data[] = random_int(0, 150);
            }
        $databis = array();
        for($j = 0; $j<7; $j++) {
            $databis[] = random_int(0, 150);
        }
        $datathird = array();
            for($k = 0; $k<7; $k++) {
                $datathird[] = random_int(0, 150);
            }
        $datafourth = array();
        for($l = 0; $l<7; $l++) {
            $datafourth[] = random_int(0, 150);
        }
        return view('myhome', compact('data', 'databis', 'datathird', 'datafourth'));
    }
}
