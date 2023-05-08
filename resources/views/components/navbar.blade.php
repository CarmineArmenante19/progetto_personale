<div class="container-fluid">
    <div class="row">
        <div class="col-12 mt-5 d-flex justify-content-center">
            <div class="navigation">
                <li class="li-drop"><a class="anchor-drop" href="{{route('homepage')}}">Home</a></li>
                @guest
                <li class="li-drop"><a class="anchor-drop" href="{{route('register')}}">Registrati</a></li>
                <li class="li-drop"><a class="anchor-drop" href="{{route('login')}}">Login</a></li>
                @else
                <li class="dropdown li-drop" id="dropdown-navbar">
                    <a href="" class="dropdown-toggle anchor-drop" data-bs-toggle="dropdown" aria-expanded="false">
                    Article
                    </a>
                    <ul class="dropdown-menu bg-g text-b">
                    <li class="li-drop">
                        <a href="{{route('article.index')}}" class="anchor-drop"   aria-expanded="false">Tutti gli articoli</a>
                    </li>
                        <li class="li-drop"><a class="dropdown-item anchor-drop" href="{{route('article.create')}}">Crea il tuo articolo</a></li>
                    </ul>
                </li>
                <li class="dropdown li-drop" id="dropdown-navbar">
                    <a href="" class="dropdown-toggle anchor-drop" data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </a>
                    <ul class="dropdown-menu bg-g text-b">
                        @foreach($categories as $category)
                        <li class="li-drop"><a class="dropdown-item anchor-drop" href="{{route('article.category',compact('category'))}}">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                @if(Auth::user()->is_revisor)
                <li class="li-drop"><a class="dropdown-item anchor-drop revisor-anchor" href="{{route('revisor.index')}}">Zona revisore
                <span class="revisor-span">
                    {{App\Models\Article::toBeRevisionedCount()}}
                </span>
                </a>
            </li>
            @endif
                <li class="dropdown li-drop">
                    <a href="{{route('homepage')}}" class="dropdown-toggle anchor-drop" data-bs-toggle="dropdown" aria-expanded="false">
                        Benvenuto:{{Auth::user()->name}}
                    </a>
                    <ul class="dropdown-menu bg-g text-b">
                        <li class="li-drop" id="logout-button"><a class="dropdown-item anchor-drop" href="{{route('logout')}}">Logout</a>
                            <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">@csrf</form>
                        </li>
                    </ul>
                </li>
                <li class="dropdown li-drop" id="dropdown-navbar">
                    <a href="" class="dropdown-toggle anchor-drop" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="logo-lingue" src="/storage/images/language.png" alt="immagine lingue">
                    </a>
                        <ul class="dropdown-menu bg-g text-b">
                            <li class="li-drop d-flex justify-content-evenly align-items-center">
                                <x-language lang="it"/>
                                Italiano
                            </li>
                            <li class="li-drop d-flex justify-content-evenly align-items-center">
                                <x-language lang="en"/>
                                Inglese
                            </li>
                            <li class="li-drop d-flex justify-content-evenly align-items-center">
                                <x-language lang="es"/>
                                Spagnolo
                            </li>
                        </ul>
                </li>
                <li class="dropdown li-drop">
                <form action="{{route('article.search')}}" method="GET">
                    @csrf
                    <input type="search" name="searched" placeholder="Search">
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
                </li>
                @endguest
                    <span class="toggleMenu"></span>
            </div>
        </div>
    </div>
</div>



