<x-app-layout>

    <div class="letter">
        <div class="letter_container">

            <form action="{{ route('authUpdate') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                <div class="form-control">
                    <label for="name">Nombre de usuario</label>
                    <input id="name" name="name" value="{{ Auth::user()->name }}" type="text" required>
                </div>
                <div class="form-control">
                    <label for="firstName">Nombres</label>
                    <input name="firstName" id="firstName" value="{{ Auth::user()->first_name }}" type="text"
                        required>
                </div>
                <div class="form-control">
                    <label for="lastName">Apellidos</label>
                    <input id="lastName" name="lastName" value="{{ Auth::user()->last_name }}" type="text" required>
                </div>

                <div class="form-control">
                    <label for="email">Correo</label>
                    <input id="email" name="email" value="{{ Auth::user()->email }}" type="email">
                </div>


                <div>
                    <button class="btn_submit" type="submit">Actualizar datos </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
