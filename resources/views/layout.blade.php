<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blog I.E.S. El Rincón</title>

        <!-- Fonts -->

        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

        <!--Icons-->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!--Script-->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

        <!-- Styles -->

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-color: #ebebeb;
            }

            .tooltipo{
                position: relative;
                display: inline-block;
            }

            .tooltipo .tooltip-text{
                visibility: hidden;
                background-color: black;
                color: #fff;
                text-align: center;
                border-radius: 6px;
                padding: 5px 0;

                /* Position the tooltip */
                position: absolute;
                z-index: 1;
                top: 100%;
                left: 50%;
                margin-left: -60px;
            }

            .tooltipo:hover .tooltip-text {
                visibility: visible;
            }

            .alt {
                color: red;
            }
        </style>


    </head>
    <body class="d-flex flex-column min-vh-100">

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

                            <li><a class="dropdown-item" href="/categories/6">Deportes</a></li>
                            <li><a class="dropdown-item" href="/categories/7">Videojuegos</a></li>
                        </ul>
                    </li>

                @if(@Auth::user() !== null)

                        @if(@Auth::user()->hasRole('admin'))

                            <li><a href="{{url('/users')}}" class="nav-link px-2 text-dark">Lista de usuarios</a></li>

                        @endif

                    @endif

                </ul>

                <form action="{{url('/')}}" method="post" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    @csrf
                    <input type="search" name="title" class="form-control form-control-dark" placeholder="Buscar..." aria-label="Search">
                </form>

                <div class="text-end">

                    @if(@Auth::user() !== null)

                        <a href="{{ url('users/'.@Auth::user()->id.'/edit') }}" style="text-decoration: none;">
                            <button type="button" class="btn btn-outline-success me-2">Editar perfil</button>
                        </a>

                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="text-decoration: none">
                            <button type="button" class="btn btn-outline-dark me-2">Salir</button>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>



                        @if(@Auth::user()->banned == 1)

                            <div class="tooltipo" style="color: red">

                                <span><i class='bx bxs-lock-alt alt'></i>Bienvenid@ {{@Auth::user()->name}}</span>

                                <span class="tooltip-text" >Estas baneado, ponte en contacto con el administrador para solicitar un desbaneo</span>

                            </div>

                        @else

                            <span>Bienvenid@ {{@Auth::user()->name}}</span>

                        @endif

                    @else

                        <a href="{{ route('login') }}" style="text-decoration: none">
                            <button type="button" class="btn btn-outline-dark me-2">Iniciar Sesión</button>
                        </a>

                        <a href="{{ route('register') }}" style="text-decoration: none">
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

    <footer style="border-top: double 3px grey !important;" class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top mt-auto">
        <p class="col-md-4 mb-0 text-muted">© 2022 Company, Inc</p>


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
