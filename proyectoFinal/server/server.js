const multer = require('multer');
const cors = require('cors');
const express = require('express'),
    app = express(),
    http = require('http').Server(app),
    io = require('socket.io')(http, {
        allowEIO3: true,
        cors:{
            origin: ['http://127.0.0.1:8000'],
            credential:true,
        }
    }),
    { MongoClient, ObjectId } = require('mongodb'),
    url = 'mongodb://127.0.0.1:27017',
    client = new MongoClient(url),
    dbname = 'eduInfantil';
    port = 3001;

const path = require('path');
const { stringify } = require('querystring');
app.use(cors({
    origin: ['http://127.0.0.1:8000'],
    credentials: true
}));
app.use(express.static(path.join(__dirname, 'views')));
app.use(express.json());



async function conectarMongoDb(){
    await client.connect();
    return client.db(dbname);
}
io.on('connect', socket=>{
    console.log('Chat conectado...');

    socket.on('chat', async chat=>{
        let db = await conectarMongoDb(),
            collection = db.collection('chat');
        collection.insertOne(chat);
        socket.broadcast.emit('chat', chat); //envia todos menos a mi..., es decir a los demas.
    });
    socket.on('historial', async ()=>{
        let db = await conectarMongoDb(),
            collection = db.collection('chat'),
            chats = await collection.find().toArray();
        socket.emit('historial', chats); //se envia solo a mi...
    });
});

app.get('/', (req, resp)=>{
    resp.sendFile(__dirname + '/index.html');
});
// app.get('/usuarios/listar', async (req, resp) => {
//     let db = await conectarMongoDb(),
//         collection = db.collection('usuarios'),
//         usuarios = await collection.find().toArray();
//     resp.send(usuarios);
// });
app.post('/usuarios/guardar', async(req, resp)=>{
    let db = await conectarMongoDb(),
        collection = db.collection('usuarios');
    collection.insertOne(req.body);
    console.log(req.body);
    resp.send(req.body);
});

// app.post('/kid/save', async(req, resp) => {
//     let db = await conectarMongoDb(),
//     collection = db.collection('kids');
//     collection.insertOne(req.body);
//     console.log(req.body);
//     resp.send(req.body);
// })

//pruebas para subir imagen
const storage = multer.diskStorage({
    destination: 'uploads/', // Carpeta donde se guardarán las imágenes
    filename: (req, file, cb) => {
      // Generar un nombre único para la imagen
      const uniqueSuffix = Date.now() + '-' + Math.round(Math.random() * 1e9);
    cb(null, file.fieldname + '-' + uniqueSuffix + '.' + file.originalname.split('.').pop());
    }
});

// Crear el middleware de multer
const upload = multer({ storage });

// //Ruta para cargar los archivos
// app.post('/upload', upload.single('image'), async (req, res) => {
//     try {
//       // Obtener la información del archivo subido
//     const { filename, mimetype, size } = req.file;

//       // Conectar a la base de datos
//     const db = await conectarMongoDb();

//       // Insertar la información de la imagen en la colección
//     const collection = db.collection('images');
//     await collection.insertOne({
//         filename,
//         mimetype,
//         size,
//         uploadedAt: new Date()
//     });

//       // Devolver una respuesta al cliente
//     res.send('Imagen guardada correctamente');
//     } catch (error) {
//     console.error('Error al guardar la imagen:', error);
//     res.status(500).send('Error al guardar la imagen');
//     }
// });
// app.post('/kid/save', upload.single('image'), async (req, res) => {
//     try {
//     const { filename, mimetype, size } = req.file;
//     const { idProfile,nombres, apellidos, edad } = req.body;

//       // Conectar a la base de datos
//     const db = await conectarMongoDb();

//       // Insertar la información del niño y la imagen en la colección
//     const collection = db.collection('kids');
//     await collection.insertOne({
//         _id: idProfile,
//         nombres,
//         apellidos,
//         edad,
//         image: {
//         filename,
//         mimetype,
//         size,
//         uploadedAt: new Date()
//         }
//     });

//       // Devolver una respuesta al cliente
//     res.send('Información guardada correctamente');
//     } catch (error) {
//     console.error('Error al guardar la información:', error);
//     res.status(500).send('Error al guardar la información');
//     }
// });
app.post('/kid/save', upload.single('image'), async (req, res) => {
    try {
    const { filename, mimetype, size } = req.file;
    const { idProfile, nombres, apellidos, edad } = req.body;

      // Conectar a la base de datos
    const db = await conectarMongoDb();

      // Buscar el niño en la colección
    const collection = db.collection('kids');
    const existingKid = await collection.findOne({ _id: idProfile });

    if (existingKid) {
        // El niño ya existe, actualizar el registro
        await collection.updateOne(
        { _id: idProfile },
        {
            $set: {
            nombres,
            apellidos,
            edad,
            image: {
                filename,
                mimetype,
                size,
                uploadedAt: new Date(),
            },
            },
        }
        );
    } else {
        // El niño no existe, crear un nuevo registro
        await collection.insertOne({
        _id: idProfile,
        nombres,
        apellidos,
        edad,
        image: {
            filename,
            mimetype,
            size,
            uploadedAt: new Date(),
        },
        });
    }

      // Devolver una respuesta al cliente
        res.send('Información guardada correctamente');
    } catch (error) {
        console.error('Error al guardar la información:', error);
        res.status(500).send('Error al guardar la información');
    }
});


//mostrar la imagen
// app.use('/uploads', express.static('uploads'));
app.use('/uploads', express.static(path.join(__dirname, 'uploads')));

//----------------------------------

//para mostrar el perfil

// let idP = '116234974879240022188';
app.post('/usuarios/identificador', async (req, resp) => {
    try {
        const { identificador } = req.body;
        idP = identificador;
        resp.json({ message: 'Identificador recibido correctamente' });
    } catch (error) {
        console.error(error);
        resp.status(500).send('Error al recibir el identificador');
    }
});


app.get('/usuarios/listar', async (req, resp) => {
    try {
        let db = await conectarMongoDb(),
            collection = db.collection('kids'),
            user = await collection.findOne({_id: idP});

        // resp.setHeader('Content-Type', 'application/json');
        resp.send(JSON.stringify(user));
        // res.json(user + 'se envia');
    } catch (error) {
        console.error(error);
        res.status(500).send('Error al obtener el usuario');
    }

});

// app.get('/usuarios/listar', async (req, resp) => {
//     try {
//         let db = await conectarMongoDb(),
//             collection = db.collection('kids'),
//             user = await collection.findOne({_id: '116234974879240022188'});

//         // Genera la ruta completa del archivo HTML
//         const filePath = path.join(__dirname, 'index.html');

//         // Envia el archivo HTML al cliente
//         resp.sendFile(filePath);
//     } catch (error) {
//         console.error(error);
//         resp.status(500).send('Error al obtener el usuario');
//     }
// });


//-------------------------------------

http.listen(port,event=>{
    console.log('Servidor escuchando en el puerto ', port);
});
