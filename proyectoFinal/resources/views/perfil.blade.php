@include('header')

    <form class="mt-4 formulario-ninos">
    <h2> @csrf </h2>
    @method('PUT')

    <div class="form-group">
        <label for="name">Usuario</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name ?? '' }}" readonly >
    </div>
    </div>
    <div class="form-group">
        <label for="email">Correo</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email ?? '' }}" readonly>
    </div>
    {{-- <br>
    <div class="form-group">
        <a href="/perfilInfantil" class="btn-editar">Editar perfil infantil</a>
    </div> --}}
    <br>
    <div class="form-group">
        <a href="/showInfo" class="btn-editar">Perfil infantil</a>
    </div>
    <br>
    <transition>
        <a href="/logout" class="btn-cerrar-sesion">Cerrar sesion</a>
    </transition>

 </form>

@include('footer')
