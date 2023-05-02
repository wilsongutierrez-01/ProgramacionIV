/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// import img from 'imagen.js';
// import {img}  from './imagen';
import './bootstrap';
import { createApp } from 'vue';
import alumno from './components/AlumnoComponent.vue';
import docente from './components/DocenteComponent.vue';
import materia from './components/MateriaComponent.vue';
import matricula from './components/MatriculaComponent.vue';
import inscripcion from './components/InscripcionComponent.vue';
window.db = '';


const app = createApp({
    components:{
        alumno,
        docente,
        materia,
        matricula,
        inscripcion,
    },
    data(){
        return{
            forms:{
                docente:{ mostrar:false, },
                materia:{ mostrar:false, },
                alumno:{ mostrar:false, },
                matricula:{ mostrar:false, },
                inscripcion:{ mostrar:false, },
            }
        }
    },
    methods: {
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
                    tblmaterias = req.createObjectStore('tblmaterias',{keyPath:'idMateria'}),
                    tblmatriculas = req.createObjectStore('tblmatriculas',{keyPath:'idMatricula'});

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
    created(){
        this.abrirBD();
    }
});

app.mount('#app');


async function seleccionarImagen(image){
    try{
        let archivo = image.files[0];
        if(archivo){
            try{
                let blob = await img(archivo, 1),
                reader = new FileReader();
                reader.onload = e=>{
                    app.$refs.matricula.matricula.comprobante = e.target.result;
                    console.log(e.target.result);
                };
                reader.readAsDataURL(blob);
                console.log('en el if')

            }catch (error){
                console.error(error);
            }

        }else {
            console.log('en el else')

            console.log("Poir favor seleccione una imagen validad...")
        }

    }catch(err){
        console.error(err);
    }

}

// const img=(archivo, calidad)=>{
//     return new Promise((resolve, reject)=>{
//         const $canvas = document.createElement('canvas'),
//             imagen = new Image();
//         imagen.onload = ()=>{
//             $canvas.width = imagen.width;
//             $canvas.height = imagen.height;

//             $canvas.getContext("2d").drawImage(imagen, 0, 0, $canvas.width, $canvas.height);
//             $canvas.toBlob(blob=>{
//                 if(blob==null) return reject(blob);
//                 resolve(blob);
//             },"image/jpeg", calidad);
//         };
//         imagen.src = URL.createObjectURL(archivo);
//     });
// };
