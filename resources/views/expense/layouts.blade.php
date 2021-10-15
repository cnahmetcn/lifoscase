<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

    </style>
<link href="{{asset('assets/css/pricing.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  @yield('extras')
</head>
  <body>


<div class="container py-3">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <span class="fs-4">Lifos Yazılım Case</span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="{{route('list')}}" class="nav-link {{ (request()->is('/*')) ? 'active' : '' }}" aria-current="page">Gider Listesi</a></li>
        <li class="nav-item"><a href="{{route('addex')}}" class="nav-link {{ (request()->is('yeni-gider-ekle*')) ? 'active' : '' }}">Yeni Gider Ekle</a></li>
        <li class="nav-item"><a href="{{route('report')}}" class="nav-link {{ (request()->is('kategorisel-rapor*')) ? 'active' : '' }}">Kategorisel Rapor</a></li>
        <li class="nav-item"><a href="{{route('map')}}" class="nav-link {{ (request()->is('haritada-goster*')) ? 'active' : '' }}">Haritada Göster</a></li>
      </ul>
    </header>

  <main>
        @yield('content')
  </main>

  <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <small class="d-block mb-3 text-muted">Ahmet Can | Lifos Yazılım &copy; {{now()->year}}</small>
      </div>
    </div>
  </footer>
</div>



  </body>
</html>
