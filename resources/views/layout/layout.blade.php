<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Events')</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('assets/styles/style.css') }}">
  @yield('styles')
</head>
<body class="mt-0">
<nav class="navbar navbar-expand-lg bg-dark text-white" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="px-3 py-2 text-decoration-underline text-white" href="{{ route('home') }}">Тестовое BRICK</a>
    @can('admin')
      <a class="nav-link p-2" href="{{ route('dashboard') }}">
        Администратор
      </a>
    @endcan
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0">
        @if(Route::has('login'))
          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('dashboard') }}">Профиль</a></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}">Выйти</a></li>
              </ul>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Войти</a>
            </li>
          @endauth
        @endif
      </ul>
    </div>
  </div>
</nav>
<main class="main">
  <div class="container-fluid">
    @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @if(session('success'))
      <div class="alert alert-success mt-3">
        {{ session('success') }}
      </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
          {{ session('error') }}
    </div>
   @endif

    <!-- ========= -->
    @yield('content')
    <!-- ========= -->
     
  </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@yield('scripts')
</body>
</html>