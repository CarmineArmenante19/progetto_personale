<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class ArticleCreate extends Component
{
    use WithFileUploads;
    public $name;
    public $brand;
    public $description;
    public $price;

    public $category;

    public $temporary_images;

    public $images=[];

    protected $rules=
    [
        'name'=>'required|min:0|max:100',
        'brand'=>'required|min:0|max:100',
        'description'=>'required|min:10|max:300',
        'price'=>'required',
        'category'=>'required',
        'images.*'=>'image|max:1024',
        'temporary_images.*'=>'image|max:1024',
    ];

    protected $messages=
    [
        'required'=>"Il/la :attribute è richiesto",
        'min'=>"La :attribute è troppo corta",
        'max'=>'Hai superato il numero di caratteri consentiti',
        'image'=>'Il file deve essere un immagine',
        'images.*.max'=>'L\'immagine deve essere massimo di 1gb',
        'temporary_images.*.max'=>'L\'immagine deve essere massimo di 1gb'
    ];

    public function updatedTemporaryImages()
    {
        if($this->validate(['temporary_images.*'=>'image']))
        {
            foreach($this->temporary_images as $image)
            {
                $this->images[]=$image;
            }
        }
    }

    public function removeImage($key)
    {
        if(in_array($key,array_keys($this->images)))
        {
            unset($this->images[$key]);
        }
    }
    public function create()
    {
        $this->validate();
        $category=Category::findOrFail($this->category);
        $article=$category->articles()->create(
            [
            'name'=>$this->name,
            'brand'=>$this->brand,
            'description'=>$this->description,
            'price'=>$this->price,
            'user_id'=>Auth::user()->id,
            ]
        );

        if (count($this->images))
        {
            foreach ($this->images as $image)
            {
                $article->images()->create(['path'=>$image->store('public/images')]);
            }
        }

        $article->user()->associate(Auth::user());
        $article->save();
        $this->reset();

        return redirect(route('homepage'))->with('message','articolo creato aspetta che venga accettato dal revisore');
        
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
