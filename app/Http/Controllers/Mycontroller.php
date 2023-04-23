<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class Mycontroller extends Controller
{
    public function homepage(){
        $title='C.A. Products';
        $articles=Article::latest()->paginate(3);
        return view('welcome',compact('title','articles'));
    }
}
