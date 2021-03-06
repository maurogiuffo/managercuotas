<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                   
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Ingreso</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('clientes.index') }}">Clientes</a> 
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('recibos.index') }}">Recibos</a> 
                            </li>
                            @if(Auth::user()->isAdmin())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cuotas.index') }}">Cuotas</a> 
                            </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Salir
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        
        <main class="py-4">
          <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-offset-2">
                      @if(session('info'))
                        <div class="row">
                            <div class="col-md-8">
                                 <div class="alert alert-success" role="alert">
                                      {{ session('info') }}
                                 </div>
                            </div>
                        </div>
                        @endif

                        @if(session('error'))
                        <div class="row">
                            <div class="col-md-8">
                                 <div class="alert " role="danger">
                                      {{ session('error') }}
                                 </div>
                            </div>
                        </div>
                        @endif

                        @if(count($errors))
                        <div class="row">
                            <div class="col-md-8">
                                 <div class="alert " role="danger">
                                      <ul>
                                          @foreach($errors->all() as $error)
                                          <li>
                                              {{$error}}
                                          </li>

                                          @endforeach
                                      </ul>
                                 </div>
                            </div>
                        </div>
                        @endif
                
                        @guest
                         @else
                            <a href="{{ URL::previous() }}" class="btn btn-sm btn-primary">Atras</a>
                         @endguest
                        </div>
                    </div>
                </div>

                @yield('content')
                @yield('scripts')
        </main>
    </div>
</body>
</html>
