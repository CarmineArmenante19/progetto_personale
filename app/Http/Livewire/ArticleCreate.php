<?php

namespace App\Http\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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
                // $annuncio->images()->create(['path' => $image->store('images', 'public')]);
                $newFileName="articles/{$article->id}";
                $newImage=$article->images()->create(['path'=>$image->store($newFileName,'public')]);

                dispatch(new ResizeImage($newImage->path,300,300));
                dispatch(new GoogleVisionSafeSearch($newImage->id));
                dispatch(new GoogleVisionLabelImage($newImage->id));
            }

            File::deleteDirectory((storage_path('/app/livewire-tmp')));
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
