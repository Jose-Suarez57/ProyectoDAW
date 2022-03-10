<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blog I.E.S. El Rincón</title>
        <link rel="icon" href="icono.png">

        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

        <!--Script-->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

        <!-- Styles -->

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-color: #ebebeb;
            }
        </style>


    </head>
    <body>

    <header class="p-3">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{url('/')}}" class="nav-link px-2 text-dark">Inicio</a></li>

                    @if(@Auth::user() !== null)

                        <li><a href="{{url('/posts/create')}}" class="nav-link px-2 text-dark">Crear entrada</a></li>

                    @endif

                    <li class="nav-item dropdown">
                        <a style="color: black" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Buscar por categorías
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/categories/1">Informática</a></li>
                            <li><a class="dropdown-item" href="/categories/2">Cocina</a></li>

                            @if(@Auth::user() !== null && @Auth::user()->age >= 18)

                                <li><a class="dropdown-item" href="/categories/3">Criptomonedas +18</a></li>

                            @endif

                            <li><a class="dropdown-item" href="/categories/4">Cine y series</a></li>

                            @if(@Auth::user() !== null && @Auth::user()->age >= 18)

                                <li><a class="dropdown-item" href="/categories/5">Apuestas +18</a></li>

                            @endif

                            <li><a class="dropdown-item" href="/categories/6">Videojuegos</a></li>
                        </ul>
                    </li>


                @if(@Auth::user() !== null)

                        @if(@Auth::user()->hasRole('admin'))

                        @elseif(@Auth::user()->hasRole('client'))



                        @endif

                    @endif

                </ul>

                <form action="{{url('/')}}" method="post" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    @csrf
                    <input type="search" name="name" class="form-control form-control-dark" placeholder="Buscar..." aria-label="Search">
                </form>

                <div class="text-end">

                    @if(@Auth::user() !== null)

                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <button type="button" class="btn btn-outline-dark me-2">Salir</button>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    @else

                        <a href="{{ route('login') }}">
                            <button type="button" class="btn btn-outline-dark me-2">Iniciar Sesión</button>
                        </a>

                        <a href="{{ route('register') }}">
                            <button type="button" class="btn btn-warning">Registrarse</button>
                        </a>

                    @endif

                </div>
            </div>
        </div>
    </header>

    <div style="margin-bottom: 25px" class="container">

        <div style="margin-top: 25px; padding-bottom: 15px; background-color: white; box-shadow: 6px 0px 6px #ababab, 6px 6px 6px #ababab, -6px 6px 6px #ababab; border-radius: 4px" class="row">

            <!--

            AQUÍ SE INSERTAN LOS DATOS

            -->

            @yield('content')


        </div>

    </div>

    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-muted">© 2021 Company, Inc</p>


        <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
        </ul>
    </footer>

    </body>
</html>
