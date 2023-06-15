
@include('header')
<input type="text" id="idProfile" name="idProfile" style="display: none" value="{{$user->external_id}}">
{{-- <input type="text" class="form-control" id="lastname" name="lastname"  readonly> --}}



<div class="row">
    <div class="col-12 col-md-6">
        <div class="card border-primary w-75">
            <div class="card-header bg-primary text-white">Comparte tu experiencia con nuestros usuarios</div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <ul id="ltsMensajes" style="color: aliceblue; size:20px"></ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <form id="frmChat" onsubmit="guardarChat(event)">
                            <input type="text" placeholder="Escribe tu mensaje" required class="form-control" />
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.5.1/socket.io.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>


    const socket = io('http://127.0.0.1:3001');

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// para que funcione con imagen de usuario
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//     function guardarChat(event) {
//         event.preventDefault();
//         const messageInput = document.querySelector('#frmChat input[type="text"]');
//         const message = messageInput.value;

//         if (message !== '') {
//             const chat = {
//             from: nombreUsuario,
//             image: imagenUsuario, // Agregar la imagen de perfil al objeto chat
//             to: 'todos',
//             message,
//             status: '',
//             fecha: new Date()
//         };
//             socket.emit('chat', chat);
//             messageInput.value = '';
//         } else {
//             alert('Por favor, escribe un mensaje');
//         }
// }

// socket.on('chat', chat => {
//   const ltsMensajes = document.getElementById('ltsMensajes');
//   const li = document.createElement('li');
//   li.innerText = `${chat.from} - ${chat.message}`;
//   // Modificar el contenido del elemento li para incluir la imagen de perfil
//   li.innerHTML = `<img src="${chat.image}" alt="Foto de perfil"> ${li.innerText}`;
//   ltsMensajes.appendChild(li);
//   ltsMensajes.scrollTop = ltsMensajes.scrollHeight; // Desplazar hacia abajo automáticamente
// });

// socket.emit('historial');

// socket.on('historial', chats => {
//   const ltsMensajes = document.getElementById('ltsMensajes');
//   ltsMensajes.innerHTML = '';
//   chats.forEach(chat => {
//     const li = document.createElement('li');
//     li.innerText = `${chat.from} - ${chat.message}`;
//     // Modificar el contenido del elemento li para incluir la imagen de perfil
//     li.innerHTML = `<img src="${chat.image}" alt="Foto de perfil"> ${li.innerText}`;
//     ltsMensajes.appendChild(li);
//   });
// });

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++



    function guardarChat(event) {
        event.preventDefault();
        const messageInput = document.querySelector('#frmChat input[type="text"]');
        const message = messageInput.value;

        if (message !== '') {
            const chat = {
                _id : idUsuario,
                from: nombreUsuario,
                to: 'todos',
                message,
                status: '',
                fecha: new Date()
            };
            socket.emit('chat', chat);
            messageInput.value = '';
        } else {
            alert('Por favor, escribe un mensaje');
        }
    }

    socket.on('chat', chat => {
        const ltsMensajes = document.getElementById('ltsMensajes');
        const li = document.createElement('li');
        li.innerText = `${chat.from} - ${chat.message}`;
        ltsMensajes.appendChild(li);
        ltsMensajes.scrollTop = ltsMensajes.scrollHeight; // Desplazar hacia abajo automáticamente
    });

    socket.emit('historial');

    socket.on('historial', chats => {
        const ltsMensajes = document.getElementById('ltsMensajes');
        ltsMensajes.innerHTML = '';
        chats.forEach(chat => {
            const li = document.createElement('li');
            li.innerText = `${chat.from} -> ${chat.message}`;
            ltsMensajes.appendChild(li);
        });
    });


    let nombreUsuario, apellidoUsuario, edadUsuario, imagenUsuario, idUsuario;

    function mostrarDatosUsuario(user) {

            idUsuario = user._id;
            nombreUsuario = user.nombres;
            apellidoUsuario = user.apellidos;
            edadUsuario = user.edad;

            document.getElementById('lastname').value = idUsuario;

        }

    function identificador(){
                const data = {
                    identificador: idProfile.value
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
