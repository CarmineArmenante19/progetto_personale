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
                <div class="col-12">
                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="https://picsum.photos/900" class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="https://picsum.photos/901" class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="https://picsum.photos/902" class="d-block w-100" alt="...">
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                      <h5 class="card-title">{{$article_to_check->name}}</h5>
                      <h5 class="card-title">{{$article_to_check->brand}}</h5>
                      <p class="card-text">{{$article_to_check->description}}</p>
                      <h5 class="card-title">{{$article_to_check->price}}</h5>
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
        </div>
    @endif
</x-layout>