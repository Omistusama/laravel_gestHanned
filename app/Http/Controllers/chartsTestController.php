<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class chartsTestController extends Controller
{
    public function index()
    {
        return view('chartstest');
    }
    
    public function index2()
    {
        return view('chartstest2');
    } 

}
