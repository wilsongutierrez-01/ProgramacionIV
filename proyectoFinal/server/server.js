import express from 'express';
import { createServer } from 'http';
import { MongoClient } from 'mongodb';

const app = express();
const http = createServer(app);
const url = 'mongodb://localhost:27017';
const client = new MongoClient(url);
const dbname = 'edInfantil';


// const express = require('express'),
//     app = express(),
//     http = require('http').Server(app),
//     { MongoClient } = require('mongodb'),
//     url = 'mongodb://localhost:27017',
//     client = new MongoClient(url),
//     dbname = 'edInfantil';
const port = 8001;
app.use(express.json());

async function conectarMongoDb(){
    await client.connect();
    return client.db(dbname);
}
app.get('/', (req, resp)=>{
    resp.sendFile(__dirname + '/index.html');
});

app.get('/usuarios/listar', async (req, resp) => {
    let db = await conectarMongoDb(),
        collection = db.collection('usuarios'),
        usuarios = await collection.find().toArray();
    resp.send(usuarios);
});
app.post('/kid/guardar', async(req, resp)=>{
    let db = await conectarMongoDb(),
        collection = db.collection('usuarios');
    collection.insertOne(req.body);
    console.log(req.body);
    resp.send(req.body);
});

http.listen(port,event=>{
    console.log('Servidor escuchando en el puerto ', port);
});
