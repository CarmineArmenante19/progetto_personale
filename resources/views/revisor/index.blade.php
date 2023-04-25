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
                <!-- Slider main container -->
                <div class="swiper swiper-detail">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide"><img src="https://picsum.photos/300" alt=""></div>
                        <div class="swiper-slide"><img src="https://picsum.photos/301" alt=""></div>
                        <div class="swiper-slide"><img src="https://picsum.photos/302" alt=""></div>
                        <div class="swiper-slide"><img src="https://picsum.photos/303" alt=""></div>
                        <div class="swiper-slide"><img src="https://picsum.photos/304" alt=""></div>
                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
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
            
                