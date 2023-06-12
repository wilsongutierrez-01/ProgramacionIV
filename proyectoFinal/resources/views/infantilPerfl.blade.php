@include('header')


<h1>Perfil de Usuario</h1>
    <div id="profile">
        <input type="text" id="idPerfil" name="idPerfil" value="{{$userI->external_id}}" style="display: none2">
        <p><strong>Nombre:</strong> <span id="name"></span></p>
        <p><strong>Apellidos:</strong> <span id="lastname"></span></p>
        <p><strong>Edad:</strong> <span id="age"></span></p>
        <img id="image" src="" alt="Imagen del perfil">
    </div>

    <script>
        function mostrarDatosUsuario(user) {
            document.getElementById('name').textContent = user.nombres;
            document.getElementById('lastname').textContent = user.apellidos;
            document.getElementById('age').textContent = user.edad;
            document.getElementById('image').src = 'http://127.0.0.1:3001/uploads/'+ user.image.filename;
        }
        function identificador(){
            const data = {
                identificador: idPerfil.value
            };
            fetch('http://127.0.0.1:3001/usuarios/identificador', {
                method: 'POST',
                body: JSON.stringify(data),
                headers:{
                    'Content-Type': 'application/json'
                }
            })
            .then(resp=>resp.json())
            .then(resp=>{
                console.log(resp);
            });
        }
        function obtenerDatosUsuario() {
            fetch('http://127.0.0.1:3001/usuarios/listar')
                .then(response => response.json())
                .then(user => {
                    mostrarDatosUsuario(user);
                })
                .catch(error => console.error(error));
        }

        document.addEventListener("DOMContentLoaded", event => {
            identificador();
            obtenerDatosUsuario();
        });
    </script>

{{-- <h1>Perfil de Usuario</h1>
<div id="profile">
    <p><strong>Nombre:</strong> <span id="name"></span></p>
    <p><strong>Apellidos:</strong> <span id="lastname"></span></p>
    <p><strong>Edad:</strong> <span id="age"></span></p>
</div> --}}

{{-- <script>

    function info(){

        fetch('http://127.0.0.1:3001/usuarios/listar')
            .then(resp => resp.json())
            .then(user => {
                document.getElementById('name').textContent = user.nombres;
                document.getElementById('lastname').textContent = user.apellidos;
                document.getElementById('age').textContent = user.edad;
            })
            .catch(error => console.error(error));
    }

    document.addEventListener("DOMContentLoaded", event=>{
            info();
        });
</script> --}}


@include('footer')
