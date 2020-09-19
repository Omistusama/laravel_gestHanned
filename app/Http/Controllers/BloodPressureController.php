<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BloodPressureController extends Controller
{
    public function index(Request $request){
        $mybp = BloodPressure::all();

        return view('index', compact('mybp'));
    }


}
