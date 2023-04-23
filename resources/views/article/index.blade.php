<x-layout>
    <x-header title="{{$title}}"/>
    <div class="container-fluid">
        <div class="row justify-content-center">
            @foreach ($articles as $article)
            <div class="col-12 col-md-4">
                <x-card :article="$article"/>
            </div>
            @endforeach
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="d-flex justify-content-center">
                    {{$articles->links()}}
                </div>
            </div>
        </div>
    </div>
</x-layout>

