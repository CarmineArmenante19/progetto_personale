<x-layout>
    <x-header title="{{$title}}"/>
    <div class="container-fluid">
        <div class="row justify-content-center">
            @forelse ($articles as $article)
            <div class="col-12 col-md-4">
                <x-card :article="$article"/>
            </div>
            @empty
            <div class="col-12 col-md-6">
                <h2>Non esiste ancora nessun articolo per questa ricerca</h2>
                <p>Corri a creare il primo:</p>
                <button class="btn btn-success"><a href="{{route('article.create')}}">Crea articolo</a></button>
            </div>
        </div>
    </div>
    @endforelse
    {{-- <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-6">
                <div>
                    {{$articles->links()}}
                </div>
            </div>
        </div>
    </div> --}}
</x-layout>
        

