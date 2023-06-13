@include('header')
<input type="text" id="idPerfil" name="idPerfil" value="{{$userI->external_id}}" style="display: none">





<form class="mt-4 formulario-ninos">

    <div class="form-group">
        <img id="image" src="" alt="Imagen del perfil">
    </div>
    <div class="form-group">
        <label for="name">Nombres</label>
        <input type="text" class="form-control" id="name" name="name"  readonly >
    </div>
    </div>
    <div class="form-group">
        <label for="lastname">Apellidos</label>
        <input type="text" class="form-control" id="lastname" name="lastname"  readonly>
    </div>
    <div class="form-group">
        <label for="age">Edad</label>
        <input type="text" class="form-control" id="age" name="age"  readonly>
    </div>
    <br>
    <div class="form-group">
        <a href="/perfilInfantil" class="btn-editar">Editar perfil infantil</a>
    </div>
    <br>
    <transition>
        <a href="/perfil" class="btn-cerrar-sesion">Volver</a>
    </transition>

 </form>






    <script>
        function mostrarDatosUsuario(user) {
            document.getElementById('name').value = user.nombres;
            document.getElementById('lastname').value = user.apellidos;
            document.getElementById('age').value = user.edad;
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




@include('footer')
