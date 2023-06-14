<!DOCTYPE html>
<html>
<head>
    <title>Perfil</title>
    <link rel="stylesheet" href="{{ asset('/css/bstyles.css') }}">
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>

</head>
<body>
    <h1>Perfil Infantil</h1>
    <div id="data" style="visibility: visible">

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


        {{-- <input type="text" id="idProfile" name="idProfile" style="display: none" value="{{$user->external_id}}">
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
        <button id="submit" style="visibility: visible" >Guardar</button> --}}



    </form>
</div>

<form id="irPerfil" style="visibility: hidden">
    <img id="imagen" src="/images/ahorrar.jpg" alt="">
    <br>
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
        const data = document.getElementById('data');
        const img = document.getElementById('imagen');
        const fPerfil = document.getElementById('irPerfil');


        document.getElementById('frmKid').addEventListener('submit', function (event) {
        event.preventDefault();
        guardarButton.style.visibility = 'hidden';
        perfilButton.style.visibility = 'visible';
        fPerfil.style.visibility = 'visible';
        data.style.visibility = 'hidden';
        img.style.visibility = 'visible';
        const form = document.getElementById('frmKid');
        const formData = new FormData(form);

        fetch('http://127.0.0.1:3001/kid/save', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(message => {
            if (message != 'ok'){

                alertify.error("Error al crear el usuario").position('top-center');
            }else{
                alertify.success("Usuario creado correctamente")
            }
            // alert(message);
            form.reset();
            oRead();
        })
            .catch(error => console.error(error));
        });
    </script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

</body>
</html>
