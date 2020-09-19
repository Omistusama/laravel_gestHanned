<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request){
        $mypost = Post::all();

        return view('post.index', compact('mypost'));
    }
}
