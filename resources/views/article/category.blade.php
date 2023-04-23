<x-layout>
    <x-header title="{{$category->name}}"/>
        <div class="container-fluid">
            <div class="row justify-content-center">
                @forelse ($category->articles as $categoryArticle)
                <div class="col-12 col-md-3">
                    <x-card
                    :categoryArticle="$categoryArticle"
                    />
                </div>
                @empty
                <div class="col-12 col-md-6">
                    <h2>Non esiste ancora nessun articolo per questa categoria:{{$category->name}}</h2>
                    <p>Corri a creare il primo:</p>
                    <button class="btn btn-success"><a href="{{route('article.create')}}">Crea articolo</a></button>
                </div>
                @endforelse
            </div>
        </div>
    </x-layout>
                    
                    