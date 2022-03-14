
@extends('layout')

@section('content')

    <h1 style="text-align: center; margin-top: 20px">Lista de usuarios</h1>

    <div style="margin-top: 50px; padding-bottom: 35px" class="col-md-10 col-xs-10 offset-md-1">

        <table style="margin: 0 auto; border: solid 2px black" class="table table-striped">
            <tr>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Correo electrónico</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>


            @foreach($users->sortBy('accepted') as $user)

                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->age}}</td>
                    <td>{{$user->email}}</td>
                    <td>

                        @if($user->banned == 0)

                            Disponible

                        @else

                            <span style="padding-bottom: 5px; border-bottom: solid red 2px; color: red">Usuario baneado</span>

                        @endif

                    </td>

                    <td>

                        @if($user->banned == 0)

                            <form action="{{ route('users.update', $user) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input name="banned" id="banned" type="number" hidden value="0">
                                <button class="btn btn-danger">Banear</button>
                            </form>

                        @elseif($user->banned == 1)

                            <form action="{{ route('users.update', $user) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input name="banned" id="banned" type="number" hidden value="1">
                                <button class="btn btn-primary">Quitar baneo</button>
                            </form>

                        @endif
                    </td>
                </tr>

            @endforeach



        </table>
    </div>

    {{ $users->links() }}

@stop
