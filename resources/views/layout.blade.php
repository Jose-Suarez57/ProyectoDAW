<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blog I.E.S. El Rincón</title>

        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-color: #ebebeb;
            }
        </style>


    </head>
    <body>

    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{url('/')}}" class="nav-link px-2 text-white">Inicio</a></li>
                    <li><a href="{{url('/')}}" class="nav-link px-2 text-white">Buscar categoría</a></li>

                    @if(@Auth::user() !== null)

                        <li><a href="{{url('/posts/create')}}" class="nav-link px-2 text-white">Crear entrada</a></li>

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
                            <button type="button" class="btn btn-outline-light me-2">Salir</button>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    @else

                        <a href="{{ route('login') }}">
                            <button type="button" class="btn btn-outline-light me-2">Iniciar Sesión</button>
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

        <div style="margin-top: 25px; background-color: white" class="row">

            <!--

            AQUÍ SE INSERTAN LOS DATOS

            -->

            @yield('content')


        </div>

    </div>
    </body>
</html>
