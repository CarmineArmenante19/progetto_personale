<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ArticleCreate extends Component
{
    public $name;
    public $brand;
    public $description;
    public $price;

    public $category;

    protected $rules=
    [
        'name'=>'required|min:0|max:100',
        'brand'=>'required|min:0|max:100',
        'description'=>'required|min:10|max:300',
        'price'=>'required',
        'category'=>'required'
    ];

    protected $messages=
    [
        'required'=>"Il/la :attribute è richiesto",
        'min'=>"La :attribute è troppo corta",
        'max'=>'Hai superato il numero di caratteri consentiti'
    ];
    public function create()
    {
        $this->validate();
        $category=Category::findOrFail($this->category);
        $category->articles()->create(
            [
               'name'=>$this->name,
               'brand'=>$this->brand,
               'description'=>$this->description,
               'price'=>$this->price,
               'user_id'=>Auth::user()->id
            ]

        );
        $this->reset();

        return redirect(route('homepage'))->with('message','articolo pubblicato');
        
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.article-create');
    }
}
