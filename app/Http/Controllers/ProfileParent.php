<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileParent extends Controller
{
    function index()
    {
        return DB::table('famille');
    }
}
