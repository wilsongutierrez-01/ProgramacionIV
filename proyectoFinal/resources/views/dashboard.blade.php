
@include('header')


<div class="row">
    <div class="col-12 col-md-6">
        <div class="card border-primary">
            <div class="card-header bg-primary text-white">CHAT USUARIOS</div>
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

function guardarChat(event) {
    event.preventDefault();
    const messageInput = document.querySelector('#frmChat input[type="text"]');
    const message = messageInput.value;

    if (message !== '') {
        const chat = {
            from: 'usuario',
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
        li.innerText = `${chat.from} - ${chat.message}`;
        ltsMensajes.appendChild(li);
    });
});




// const socket = io('http://127.0.0.1:3001');

// function guardarChat(event) {
//     event.preventDefault();
//     const messageInput = document.querySelector('#frmChat input[type="text"]');
//     const message = messageInput.value;

//     if (message !== '') {
//         const chat = {
//             from: 'usuario',
//             to: 'todos',
//             message,
//             status: '',
//             fecha: new Date()
//         };
//         socket.emit('chat', chat);
//         messageInput.value = '';
//     } else {
//         alert('Por favor, escribe un mensaje');
//     }
// }

// socket.on('chat', chat => {
//     const ltsMensajes = document.getElementById('ltsMensajes');
//     const li = document.createElement('li');
//     li.innerText = `${chat.from} - ${chat.message}`;
//     ltsMensajes.appendChild(li);
//     ltsMensajes.scrollTop = ltsMensajes.scrollHeight; // Desplazar hacia abajo automáticamente
// });

// socket.emit('historial');

// socket.on('historial', chats => {
//     const ltsMensajes = document.getElementById('ltsMensajes');
//     ltsMensajes.innerHTML = '';
//     chats.forEach(chat => {
//         const li = document.createElement('li');
//         li.innerText = `${chat.from} - ${chat.message}`;
//         ltsMensajes.appendChild(li);
//     });
// });


// const socket = io('http://127.0.0.1:3001');

// function guardarChat(event) {
//     event.preventDefault();
//     const messageInput = document.querySelector('#frmChat input[type="text"]');
//     const message = messageInput.value;

//     if (message !== '') {
//         const chat = {
//             from: 'usuario',
//             to: 'todos',
//             message,
//             status: '',
//             fecha: new Date()
//         };
//         socket.emit('chat', chat);
//         messageInput.value = '';
//     } else {
//         alert('Por favor, escribe un mensaje');
//     }
// }

// socket.on('chat', chat => {
//     const ltsMensajes = document.getElementById('ltsMensajes');
//     const li = document.createElement('li');
//     li.innerText = `${chat.from} - ${chat.message}`;
//     ltsMensajes.appendChild(li);
// });

// socket.emit('historial');

// socket.on('historial', chats => {
//     const ltsMensajes = document.getElementById('ltsMensajes');
//     ltsMensajes.innerHTML = '';
//     chats.forEach(chat => {
//         const li = document.createElement('li');
//         li.innerText = `${chat.from} - ${chat.message}`;
//         ltsMensajes.appendChild(li);
//     });
// });
</script>


@include('footer')
