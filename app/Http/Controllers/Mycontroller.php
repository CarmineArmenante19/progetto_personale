<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Mycontroller extends Controller
{
    public function homepage(){
        $title='C.A. Products';
        return view('welcome',compact('title'));
    }
}
