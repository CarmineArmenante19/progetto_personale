<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Mycontroller;
use App\Http\Controllers\Revisorcontroller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//* HOMEPAGE
Route::get('/',[Mycontroller::class,'homepage'] )->name('homepage');
// *Middleware article
Route::middleware(['auth'])->group(function()
{
    //* Article
    Route::get('/article/index',[ArticleController::class,'index'])->name('article.index');
    Route::get('/article/create',[ArticleController::class,'create'])->name('article.create');
    Route::get('/article/category/{category}',[ArticleController::class,'articleByCategory'])->name('article.category');
    Route::get('/article/detail/{article}',[ArticleController::class,'show'])->name('article.detail');
});

// *Middleware revisor
Route::middleware(['IsRevisor'])->group(function()
{
    // *Revisor
    Route::get('/revisor/home',[Revisorcontroller::class,'index'])->name('revisor.index');
    
    // *Revisor accetta annuncio
    
    Route::patch('/accetta/articolo/{article}',[Revisorcontroller::class,'acceptArticle'])->name('revisor.accept_article');
    
    // *Revisor rifiuta articolo
    
    Route::patch('/rifiuta/articolo/{article}',[Revisorcontroller::class,'rejecttArticle'])->name('revisor.reject_article');

    // *Rotta annulamento operazione
    
    Route::get('/revisor/undo',[Revisorcontroller::class,'undo'])->name('revisor.undo');
});

// *Richiesta revisore

Route::get('/diveta/revisore',[Revisorcontroller::class,'becomeRevisor'])->middleware('auth')->name('become.revisor');

// *Rendi revisore

Route::get('/rendi/revisore/{user}',[Revisorcontroller::class,'makeRevisor'])->name('make.revisor');
