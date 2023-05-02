<x-layout>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1 text-center text-g">
                    {{$article_to_check ?'Ecco l\'articolo da revisionare':'Non ci sono articoli da revisionare'}}
                </h1>
            </div>
        </div>
    </div>
    @if ($article_to_check)
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6">
                @if (!$article_to_check->images)
                    @foreach ($article_to_check->images as $image)
                        <div>
                            <img src="{{$image->getUrl(300,300)}}" alt="immagini articolo">
                        </div>
                        <div class="col-12">
                            <h5>tags</h5>
                            <div>
                                @if($image->labels)
                                @foreach ($image->labels as $label)
                                    <p>{{$label}}</p>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card-body">
                                <h5>Revsione immagini</h5>
                                <p>Adulti: <span>{{$image->adult}}</span></p>
                                <p>Satira: <span>{{$image->spoof}}</span></p>
                                <p>Medicina: <span>{{$image->medical}}</span></p>
                                <p>Violenza: <span>{{$image->violence}}</span></p>
                                <p>Contenuto ammicante: <span>{{$image->racy}}</span></p>
                            </div>
                        </div>
                    @endforeach
                @else
                
            @endif
            <div class="col-12 col-md-6 d-flex justify-content-start align-items-center">
                <div>
                    <h1 class="card-title">{{$article_to_check->name}}</h1>
                    <h5 class="card-title">{{$article_to_check->brand}}</h5>
                    <p class="card-text">{{$article_to_check->description}}</p>
                    <h5 class="card-title">{{$article_to_check->price}}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6">
            <form method="POST" action="{{route('revisor.accept_article',['article'=>$article_to_check])}}">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success">Accetta</button>
            </form>
        </div>
        <div class="col-12 col-md-6">
            <form method="POST" action="{{route('revisor.reject_article',['article'=>$article_to_check])}}">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-danger">Rifiuta</button>
            </form>
        </div>
        @endif
        @if (Session::has('last_article_id'))
        <div class="col-12">
            <a href="{{route('revisor.undo')}}">Annulla</a>
        </div>
        @endif
    </div>
</x-layout>
            
                