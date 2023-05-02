<template>
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">REGISTRO DE MATRICULAS</div>
                <div class="card-body">
                    <form id="frmInscripcion" @submit.prevent="guardarInscripcion" @reset.prevent="nuevoInscripcion()">
                        <div class="row p-1">
                            <div class="col-3 col-md-2">ALUMNO:</div>
                            <div class="col-9 col-md-3">
                                <v-select-alumno required v-model="inscripcion.alumno"
                                    :options="alumnos">Por favor seleccione un alumno</v-select-alumno>
                            </div>
                        </div>
                        <div class="row p-1">
                            <div class="col-3 col-md-2">MATERIA:</div>
                            <div class="col-9 col-md-3">
                                <v-select-materia required v-model="inscripcion.materia"
                                    :options="materias">Por favor seleccione un alumno</v-select-materia>
                            </div>
                        </div>
                        <div class="row p-1">
                            <div class="col-3 col-md-2">FECHA:</div>
                            <div class="col-9 col-md-6">
                                <input required class="form-control" type="date" v-model="inscripcion.fecha">
                            </div>
                        </div>
                        <div class="row p-1">
                            <div class="col col-md-6">
                                <input class="btn btn-success" type="submit" value="Guardar Datos">
                            </div>
                            <div class="col col-md-6">
                                <input class="btn btn-warning" type="reset" value="Nuevo Registro">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card text-bg-light">
                <div class="card-header">CONSULTA DE INSCRIPCIONES</div>
                <div class="card-body">
                    <form>
                        <table class="table table-dark table-hover">
                            <thead>
                                <tr>
                                    <th>BUSCAR:</th>
                                    <th colspan="4"><input type="text" @keyup="listar()" v-model="buscar"
                                        class="form-control" placeholder="Busar por nombre" ></th>
                                </tr>
                                <tr>
                                    <th>NOMBRE</th>
                                    <th>MATERIA</th>
                                    <th>FECHA</th>
                                    <th colspan="2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="inscripcion in inscripciones" @click='modificarInscripcion(inscripcion)' :key="inscripcion.idInscripcion">
                                    <td>{{inscripcion.alumno.label}}</td>
                                    <td>{{inscripcion.materia.label}}</td>
                                    <td>{{ (new Date(inscripcion.fecha +' 01:00:00')).toLocaleDateString() }}</td>
                                    <td><button @click.prevent="eliminarInscripcion(inscripcion)" class="btn btn-danger">Eliminar</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
    import  VueSelect  from 'vue-select'
    export default{
        components: {
            'v-select-alumno'   : VueSelect,
            'v-select-materia'  : VueSelect  // agregando v-select a los componentes
        },
        data() {
            return {
                db            : '',
                buscar        : '',
                inscripciones : [],
                alumnos       : [],
                materias      : [],
                accion        : 'nuevo',
                inscripcion  : {
                    idInscripcion : '',
                    fecha       : '',
                    alumno      : '',
                    materia     : {
                        id      : '',
                        label   : ''
                    }
                }
            }
        },
        methods: {
            nuevoInscripcion(){
                this.accion = 'nuevo';
                this.inscripcion.idInscripcion = '';
                this.inscripcion.fecha         = '';
                this.inscripcion.alumno.id     = '';
                this.inscripcion.alumno.label  = '';
                this.inscripcion.materia.id    = '';
                this.inscripcion.materia.label    = '';
            },
            modificarInscripcion(inscripcion){
                this.accion = 'modificar';
                this.inscripcion = inscripcion;
            },
            guardarInscripcion(){
                let glo = this.inscripcion.alumno.label;
                console.log(this.inscripcion.alumno.id);
                console.log(glo);
                if( this.inscripcion.alumno.id=='' ||
                    this.inscripcion.alumno.label=='' ||
                    this.inscripcion.fecha=='' ){
                    console.log( 'Por favor ingrese los datos correspondientes' );
                    return;
                }
                let store = this.abrirStore("tblinscripciones", 'readwrite'),
                    method = 'PUT';
                if( this.accion==='nuevo' ){
                    method = 'POST';
                    this.inscripcion.idInscripcion = new Date().getTime().toString(16);//las cantidad milisegundos y lo convierte en hexadecimal
                }
                let query = store.put( JSON.parse( JSON.stringify(this.inscripcion) ));

                console.log(this.inscripcion);
                query.onsuccess = resp=>{
                    axios({
                    url     : 'inscripciones',
                    method,
                    data    : this.inscripcion
                    }).then(resp => {
                        console.log(resp);
                    }).catch(err => {
                        console.log(err);
                    })
                    this.nuevoInscripcion();
                    this.listar();
                };
                query.onerror = err=>{
                    console.error('ERROR al guardar inscripcion', err);
                };
            },
            eliminarInscripcion(inscripcion){
                if( confirm(`Esta seguro de eliminar el inscripcion ${inscripcion.nombre}?`) ){
                    axios({
                        url     : 'inscripciones',
                        method  : 'DELETE',
                        data    : {idInscripcion :inscripcion.idInscripcion}
                    }).then(resp => {
                        console.log(resp);
                    }).then(err => {
                        console.log(err);
                    })

                    let store = this.abrirStore('tblinscripciones', 'readwrite'),
                        req = store.delete(inscripcion.idInscripcion);
                    req.onsuccess = res=>{
                        this.listar();
                    };
                    req.onerror = err=>{
                        console.error('ERROR al guardar inscripcion');
                    };
                }
            },
            listar(){
                let store = this.abrirStore('tblinscripciones', 'readonly'),
                    data = store.getAll();
                data.onsuccess = resp=>{
                    this.inscripciones = data.result
                        .filter(inscripcion=>inscripcion.alumno.label.toLowerCase().indexOf(this.buscar.toLowerCase())>-1 ||
                            inscripcion.fecha.indexOf(this.buscar)>-1);
                };
                let storeAlumno = this.abrirStore('tblalumnos', 'readonly'),
                    datAlumno = storeAlumno.getAll();
                datAlumno.onsuccess = resp=>{
                    this.alumnos = datAlumno.result.map(alumno=>{
                        return {id: alumno.idAlumno, label: alumno.nombre}
                    });
                };
                let storeMateria = this.abrirStore('tblmaterias', 'readonly'),
                datMateria = storeMateria.getAll();
                datMateria.onsuccess = resp=>{
                this.materias = datMateria.result.map(materia=>{
                        return {id: materia.idMateria, label: materia.nombre}
                    });
                };
            },
            abrirStore  (store, modo) {
                let ltx = db.transaction(store, modo);
                return ltx.objectStore(store);
            },
        },
    }
</script>
