<!DOCTYPE html>
<html>
<head>
    <title>Perfil</title>
    <link rel="stylesheet" href="{{ asset('/css/bstyles.css') }}">

</head>
<body>
    <h1>Perfil Infantil</h1>
    <form method="POST" id="frmKid">
        <input type="text" id="idProfile" name="idProfile" style="display: none" value="{{$user->external_id}}">
        <div class="form-group">
            <label for="image">Elegir foto de perfil</label>
            <input type="file" name="image" id="image" accept="image/*" required>
        </div>
        <div class="form-group">
            <label for="nombres">Nombres:</label>
            <input type="text" id="nombres" name="nombres" required>
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" required>
        </div>
        <div class="form-group">
            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" min="10" max="15" required>
        </div>
        <button id="submit" style="visibility: visible" >Guardar</button>

        <button id="submit-btn" style="visibility: hidden" >Ir a perfil</button>


    </form>

@if(isset($user))
<!-- Mostrar contenido del encabezado para usuarios autenticados -->

<!-- Otros elementos del encabezado específicos para usuarios autenticados -->
<h1>Detalles del Usuario</h1>
<p>Nombre: {{ $user->name }}</p>
<p>Email: {{ $user->email }}</p>
@else
<!-- Mostrar contenido del encabezado para usuarios no autenticados -->
<a href="/login">Iniciar sesión</a>
<!-- Otros elementos del encabezado específicos para usuarios no autenticados -->
@endif
    <script>
        document.getElementById('submit-btn').addEventListener('click', function() {
        window.location.href = 'http://127.0.0.1:8000/showInfo'; // Reemplaza 'https://www.tupagina.com' con la URL de tu página principal
    });
        // frmKid.addEventListener('submit', event => {
        //     event.preventDefault();

        //     const data = {
        //         nombres: nombres.value,
        //         apellidos: apellidos.value,
        //         edad: edad.value
        //     };
        //     fetch('kid/guardar', {
        //         method: 'POST',
        //         body: JSON.stringify(data),
        //         headers:{
        //             'Content-Type': 'application/json',
        //         }
        //     })
        //     .then(resp => resp.json())
        //     .then(resp => {
        //         console.console.log(resp);
        //     });
        // });
        const perfilButton = document.getElementById('submit-btn');
        const guardarButton = document.getElementById('submit')

        document.getElementById('frmKid').addEventListener('submit', function (event) {
        event.preventDefault();
        guardarButton.style.visibility = 'hidden';
        perfilButton.style.visibility = 'visible';


        const form = document.getElementById('frmKid');
        const formData = new FormData(form);

        fetch('http://127.0.0.1:3001/kid/save', {
          method: 'POST',
          body: formData
        })
        .then(response => response.text())
        .then(message => {
        //   alert(message);
          form.reset();
        })
        .catch(error => console.error(error));
      });
    </script>
</body>
</html>
