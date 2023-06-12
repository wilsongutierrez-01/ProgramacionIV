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
    <div class="form-group">
        <a href="/perfilInfantil" class="btn-editar">Editar perfil infantil</a>
    </div>
    <div class="form-group">
        <a href="/showInfo" class="btn-editar">perfil infantil</a>
    </div>
    <transition>
        <a href="/logout" class="btn-cerrar-sesion">cerrar sesion</a>
    </transition>

 </form>
 @if(isset($user))
 <!-- Mostrar contenido del encabezado para usuarios autenticados -->
 <p>Bienvenido, ....{{ $user->name }}</p>
 <!-- Otros elementos del encabezado específicos para usuarios autenticados -->
 <h1>Detalles del Usuario</h1>
 <p>Nombre: {{ $user->name }}</p>
 <p>Email: {{ $user->email }}</p>
@else
 <!-- Mostrar contenido del encabezado para usuarios no autenticados -->
 <a href="/login">Iniciar sesión</a>
 <!-- Otros elementos del encabezado específicos para usuarios no autenticados -->
@endif

