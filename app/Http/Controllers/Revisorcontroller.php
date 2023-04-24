<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class Revisorcontroller extends Controller
{
    public function index()
    {
        $article_to_check=Article::where('is_accepted',null)->first();
        return view('revisor/index',compact('article_to_check'));
    }
    
    public function acceptArticle(Article $article)
    {
        $article->setAccepted(true);

       return redirect()->back()->with('message','complimenti hai accetato l\'articolo');
    }
    public function rejecttArticle(Article $article)
    {
        $article->setAccepted(false);

       return redirect()->back()->with('message','complimenti hai rifiutato l\'articolo');
    }

    public function becomeRevisor()
    {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with('message','complimenti hai chiesto di diventare revisore');
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('presto:makeUserRevisor',['email'=>$user->email]);
        return redirect('/')->with('message','complimenti hai reso l\'utente revisore');
    }
}
