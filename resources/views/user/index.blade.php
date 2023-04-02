<x-app-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="letter">

        <button id="cta" class="button black"> Crear usuario</button>

    </div>

    <div class="letter">
        <div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre Usuario</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">email</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Estado</th>

                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    @if ($user !== Auth::user()->id)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->rol_name }}</td>
                            {{-- <td>{{$roles->name == $ }}</td> --}}
                            <td>
                                @if ($user->stadium === 0)
                                    <a class="button success" href="/delete/{{ $user->id }}">Inhabilitar</a>
                                @else
                                    <a class="button danger" href="/retrieve/{{ $user->id }}">Habilitar</a>
                                @endif
                            </td>

                            <td>
                                <a class="button warning" href="/user/{{ $user->id }}">Detalles</a>
                                <a class="button primary" href="/updateById/{{ $user->id }}">Actualizar</a>
                            </td>

                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>





    {{-- Modal --}}
    <section class="modal">
        <div class="modal_container">
            <h2 class="">Formulario de usuarios </h2>
            <div class="modal_form">

                <form action="{{ route('ingersar') }}" method="POST">
                    @csrf
                    <div class="form-control">
                        <label for="name">Nombre de usuario</label>
                        <input id="name" name="name" type="text" required>
                    </div>
                    <div class="form-control">
                        <label for="firstName">Nombres</label>
                        <input name="firstName" id="firstName" type="text" required>
                    </div>
                    <div class="form-control">
                        <label for="lastName">Apellidos</label>
                        <input id="lastName" name="lastName" type="text" required>
                    </div>
                    <div class="form-control">
                        <label for="email">Correo</label>
                        <input id="email" name="email" type="email" required>
                    </div>
                    <div class="form-control">
                        <label for="password">Contraseña</label>
                        <input id="password" name="password" type="password" required>
                    </div>
                    <div class="form-control">
                        <label for="roleId">Rol</label>
                        <select name="rolesId" id="roleId" required>
                            <option value="">Selecciones una opción</option>
                            @foreach ($roles as $rol)
                                <option value="{{ $rol->id }}">{{ $rol->rol_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-control">
                        <label for=""></label>
                    </div>

                <div class="letter">
                    <x-primary-button class="ml-3">
                        {{ __('Agregar') }}
                    </x-primary-button>
                </div>

                </form>
            </div>

            <a href="#" class="modal_close">Cerrar Modal</a>
        </div>
    </section>
</x-app-layout>
