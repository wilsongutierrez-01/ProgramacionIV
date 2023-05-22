<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('../../resources/css/app.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('../css/app.css') }}"> --}}

</head>
<body>
    <div class="container">
        <h2 class="mt-4">Iniciar sesión</h2>

        <!-- Formulario de inicio de sesión -->
        <form method="POST" action="/login" class="mt-4">
            @csrf
            <div class="form-group">
                <label for="email" class="correo">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
            </div>
        </form>

        <hr>

        <!-- Inicio de sesión con Google -->
        <a href="/login/google" class="btn btn-danger">Iniciar sesión con Google</a>
        <a href="/login/facebook" class="btn btn-primary">Iniciar sesión con Facebook</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
