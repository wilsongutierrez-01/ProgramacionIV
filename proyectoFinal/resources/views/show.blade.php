@include('header')

<h1>Detalles del Usuario</h1>
<p>Nombre: {{ $user->name }}</p>
<p>Email: {{ $user->email }}</p>


@include('footer')
