<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;

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
        
        
        // Prendere un solo id
        Session::put('last_article_id',$article->id);
        
        return redirect()->back()->with('message','complimenti hai accetato l\'articolo');
    }
    public function rejecttArticle(Article $article)
    {
        $article->setAccepted(false);
        
        // Prendere un solo id
        Session::put('last_article_id',$article->id);        
        
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
    
    public function undo()
    {
        $lastArticleId=Session::get('last_article_id');
        
        // Recupera il singolo annuncio precedente e annulla l'ultima operazione
        $lastArticleId=Article::findOrFail('last_article_id');
        $lastArticleId->is_accepted=null;
        $lastArticleId->save();
        
        // Rimuovi l'id dell'annuncio dalla sessione
        
        Session::forget('last_article_id');
        
        // Reinderizza alla pagina precedente
        
        return back();
    }
}
