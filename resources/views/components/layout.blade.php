<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- Google fonts CDN --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo:wght@700&family=Play:wght@700&family=Righteous&display=swap" rel="stylesheet">
    {{-- CDN Swiper js --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    {{-- LivewireStyles --}}
    @livewireStyles
    {{-- Asset Bundling (Vite) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @if (session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif
    @if (session('access.denied'))
    <div class="alert alert-success">
        {{session('access.denied')}}
    </div>
    @endif
    <x-navbar/>
    {{$slot}}
    <x-footer/>
    {{-- Anime js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- LivewireScripts --}}
    @livewireScripts
    {{-- Script Swiper js --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
</body>
</html>