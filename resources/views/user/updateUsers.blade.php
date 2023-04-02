<x-app-layout>
    <div class="letter">
        <div class="letter_container">

            <form action="{{ route('Actualiar') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $user->id }}">
                <div class="form-control">
                    <label for="name">Nombre de usuario</label>
                    <input id="name" name="name" value="{{ $user->name }}" type="text" required>
                </div>
                <div class="form-control">
                    <label for="firstName">Nombres</label>
                    <input name="firstName" id="firstName" value="{{ $user->first_name }}" type="text" required>
                </div>
                <div class="form-control">
                    <label for="lastName">Apellidos</label>
                    <input id="lastName" name="lastName" value="{{ $user->last_name }}" type="text" required>
                </div>
                <div class="form-control">
                    <label for="email">Correo</label>
                    <input id="email" name="email" type="email" value="{{ $user->email }}" required>
                </div>


                <div class="form-control">
                    <label for="pass">Contraseña</label>
                    <input id="email" name="email" type="email" value="{{ $user->email }}" required>
                </div>

                <div>
                    <button class="btn_submit" type="submit">Actualizar datos </button>
                </div>

            </form>
        </div>
    </div>


</x-app-layout>
