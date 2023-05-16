const express = require('express'),
    app = express(),
    http = require('http').Server(app),
    port = 3001;

app.get('/', (req, resp) => {
    resp.end(__dirname + '/index.html');
});

app.get('/usuarios/guardar', (req, resp) => {
    resp.end("Guardar usuarios");
})

http.listen(port, event => {
    console.log('Servidor en el puerto: ', port);
})
