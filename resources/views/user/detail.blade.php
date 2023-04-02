<x-app-layout>

    <div class="card">
        <h2 class="title">Datos del usuario {{ $user->name }} </h2>
        <div>
            <ul>
                <li>
                    Nombre de usuario : {{ $user->name }}

                </li>
                <li>
                    Nombres: {{ $user->first_name }}
                </li>
                <li>
                    Apellidos: {{ $user->last_name }}
                </li>
                <li>
                    Correo : {{ $user->email }}
                </li>
                <div>
                    Estado del usuario en el sistema :
                    @if ($user->stadium == 0)
                        Habilitado
                    @else
                        Inhabilitado
                    @endif
                </div>

            </ul>
        </div>
    </div>

</x-app-layout>
