<x-layout>
    <x-header title="{{$article->name}}"/>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6">
                    <!-- Slider main container -->
                    @if (!$article->images)
                    <div class="swiper swiper-detail">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                                @foreach ($article->images as $image)
                                <div class="swiper-slide"><img src="{{Storage::url($image->path)}}" alt="immagini prodotto"></div>
                                @endforeach
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                        @else
                        <div>
                            <h1 class="text-g text-center">Non ci sono immagini per questo pordotto</h1>
                        </div>
                        @endif
                    </div>
                <div class="col-12 col-md-6">
                    <h2>Venduto da:{{$article->user->name}}</h2>
                    <h3>{{$article->brand}}</h3>
                    <p>{{$article->description}}</p>
                    <h3>Categoria:{{$article->category->name}}</h3>
                    <h3>{{$article->price}}</h3>
                </div>
            </div>
        </div>
    </x-layout>
