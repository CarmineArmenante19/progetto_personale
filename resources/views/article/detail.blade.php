<x-layout>
    <x-header title="{{$article->name}}"/>
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