@if(Route::currentRouteName()=='homepage')
<div class="card" style="width: 18rem;">
  <img src="{{!$article->images()->get()->isEmpty() ?$article->images()->first()->getUrl(300,300) : '/storage/images/no-photos.png'}}">
  <div class="card-body">
    <h5 class="card-title">{{$article->name}}</h5>
    <h5 class="card-title">{{$article->brand}}</h5>
    <p class="card-text">{{$article->description}}</p>
    <h5 class="card-title">{{$article->price}}</h5>
    <h5 class="card-title">{{$article->category->name}}</h5>
    <h5 class="card-title">Pubblicato da:{{$article->user->name}}</h5>
    <a href="{{route('article.detail',compact('article'))}}" class="btn btn-primary">Detail</a>
  </div>
</div>
@elseif(Route::currentRouteName()=='article.category')
<div class="card" style="width: 18rem;">
<img src="{{!$categoryArticle->images()->get()->isEmpty() ? $categoryArticle->images()->first()->getUrl(300,300) : '/storage/images/no-photos.png'}}">
<div class="card-body">
  <h5 class="card-title">{{$categoryArticle->name}}</h5>
  <h5 class="card-title">{{$categoryArticle->brand}}</h5>
  <p class="card-text">{{$categoryArticle->description}}</p>
  <h5 class="card-title">{{$categoryArticle->price}}</h5>
  <h5 class="card-title">{{$categoryArticle->category->name}}</h5>
  <h5 class="card-title">Pubblicato da:{{$categoryArticle->user->name}}</h5>
  <a href="{{route('article.detail',$categoryArticle->id)}}" class="btn btn-primary">Detail</a>
</div>
</div>
@elseif(Route::currentRouteName()=='article.index')
<div class="card" style="width: 18rem;">
<img src="{{!$article->images()->get()->isEmpty() ?$article->images()->first()->getUrl(300,300) : '/storage/images/no-photos.png'}}">
<div class="card-body">
<h5 class="card-title">{{$article->name}}</h5>
<h5 class="card-title">{{$article->brand}}</h5>
<p class="card-text">{{$article->description}}</p>
<h5 class="card-title">{{$article->price}}</h5>
<h5 class="card-title">{{$article->category->name}}</h5>
<h5 class="card-title">Pubblicato da:{{$article->user->name}}</h5>
<a href="{{route('article.detail',compact('article'))}}" class="btn btn-primary">Detail</a>
</div>
</div>
@elseif(Route::currentRouteName()=='article.search')
<div class="card" style="width: 18rem;">
<img src="{{!$article->images()->get()->isEmpty() ?$article->images()->first()->getUrl(300,300) : '/storage/images/no-photos.png'}}">
<div class="card-body">
<h5 class="card-title">{{$article->name}}</h5>
<h5 class="card-title">{{$article->brand}}</h5>
<p class="card-text">{{$article->description}}</p>
<h5 class="card-title">{{$article->price}}</h5>
<h5 class="card-title">{{$article->category->name}}</h5>
<h5 class="card-title">Pubblicato da:{{$article->user->name}}</h5>
<a href="{{route('article.detail',compact('article'))}}" class="btn btn-primary">Detail</a>
</div>
</div>
@endif



