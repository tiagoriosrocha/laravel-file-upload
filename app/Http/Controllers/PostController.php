<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store2(Request $request){
        dd($request->all());
    }

    public function store3(Request $request){
        dd($request->all());
    }
}
