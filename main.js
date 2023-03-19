//const { createApp } = Vue; //Es exclusivo de la v3 de Vue.js
var db;
//createApp({
var app = new Vue({
    el: "#app",
    data: {
        forms:{
            docente     : {mostrar:false},
            alumno      : {mostrar:false},
            materia     : {mostrar:false},
            matricula   : {mostrar:false},
            inscripcion : {mostrar:false},
        }
    },
    methods:{
        abrirFormulario(form){
            this.forms[form].mostrar = !this.forms[form].mostrar;
            this.$refs[form].listar();
        },
        abrirBD(){
            let indexDB = indexedDB.open('db_sistema_academico',1);
            indexDB.onupgradeneeded=e=>{
                let req = e.target.result,
                    tbldocentes = req.createObjectStore('tbldocentes', {keyPath:'idDocente'}),
                    tblalumnos = req.createObjectStore('tblalumnos',{keyPath:'idAlumno'}),
                    tblinscripciones = req.createObjectStore('tblinscripciones', {keyPath:'idInscripcion'}),
                    tblmaterias = req.createObjectStore('tblmaterias',{keyPath:'idMateria'});
                    tblmatriculas = req.createObjectStore('tblmatriculas',{keyPath:'idMatricula'})

                tbldocentes.createIndex('idDocente', 'idDocente', {unique:true});
                tblalumnos.createIndex('idAlumno', 'idAlumno', {unique:true});
                tblmaterias.createIndex('idMateria', 'idMateria', {unique:true});
                tblinscripciones.createIndex('idInscripcion', 'idInscripcion', {unique:true});
            };
            indexDB.onsuccess= e=>{
                db = e.target.result;
            };
            indexDB.onerror= e=>{
                console.error( e );
            };
        }, 
    },
    created() {
        this.abrirBD();
    }
});

function abrirStore(store, modo) {
    let ltx = db.transaction(store, modo);
    return ltx.objectStore(store);
}

async function seleccionarImagen(image){
    let archivo = image.files[0];
    if(archivo){
        let blob = await img(archivo, 1),
            reader = new FileReader();
        reader.onload = e=>{
            app.$refs.matricula.matricula.comprobante = e.target.result;
            console.log(e.target.result);
        };
        reader.readAsDataURL(blob);
    }else {
        console.log("Poir favor seleccione una imagen validad...")
    }
}