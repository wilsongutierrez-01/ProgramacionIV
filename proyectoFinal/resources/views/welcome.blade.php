<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="{{ url('resources/css/app.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

</head>

<body>
    <div class="container">
        <div class="formulario">
            <h2>Iniciar sesión</h2>
            <div class="input-group">
              <label for="usuario">Usuario:</label>
              <input type="text" id="usuario" name="usuario" placeholder="Ingrese su usuario">
            </div>
            <div class="input-group">
              <label for="contrasena">Contraseña:</label>
              <input type="password" id="contrasena" name="contrasena" placeholder="Ingrese su contraseña">
            </div>
            <div class="button-group">
                <div class="flex">
                    <button type="submit" class="button iniciar-session">Iniciar sesión</button>

                </div>
                <div class="flex">

                    <p>¿No tienes una cuenta? <a href="/registrar">Regístrate</a></p>

                </div>
                <div>
                    <div class="flex-proveedores">
                            <a href="/login/google" class="button google-button"> Google</a>
                            {{-- <input class="button google-button"    href="/login/google" value="Google"> --}}

                            <a href="/login/facebook" class="button facebook-button">Facebook</a>

                            {{-- <input class="button facebook-button"  type="button" value="Facebook"> --}}
                    </div>
                </div>

            </div>
          </div>

    </div>
    {{-- <div class="container">
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
        <a href="/login/facebook" class="btn btn-primary">Iniciar sesión con Facebook</a> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>




