<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Category;
use Livewire\Component;

class ArticleCreate extends Component
{
    public $name;
    public $brand;
    public $description;
    public $price;
    public $vendor;

    public $category;

    protected $rules=
    [
        'name'=>'required|min:0|max:100',
        'brand'=>'required|min:0|max:100',
        'description'=>'required|min:10|max:300',
        'price'=>'required',
        'vendor'=>'required|min:0|max:30',
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
               'vendor'=>$this->vendor,
            ]

        );
        $this->reset();
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
