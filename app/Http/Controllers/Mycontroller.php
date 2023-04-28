<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Mycontroller extends Controller
{
    public function homepage(){
        $title='C.A. Products';
        $articles=Article::where('is_accepted',true)->latest()->paginate(3);
        return view('welcome',compact('title','articles'));
    }

    public function selectLanguage($lang)
    {
        Session::put('language',$lang);
        return redirect()->back();
    }

}
