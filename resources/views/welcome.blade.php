<x-layout>
    <x-header title="{{$title}}"/>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1>{{__('message.welcome')}}</h1>
            </div>
        </div>
    </div>
    {{-- <div class="container-fluid row justify-content-center">
        @foreach ($articles as $article)
            <div class="col-12 col-md-3">
                <x-card
                :article="$article"
                />
            </div>
        @endforeach
    </div> --}}
</x-layout>