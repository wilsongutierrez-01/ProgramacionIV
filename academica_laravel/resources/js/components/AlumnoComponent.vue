<template>
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">REGISTRAR ALUMNOS</div>
                <div class="card-body">
                    <form id="frmAlumno" @submit.prevent="guardarAlumno" @reset.prevent="nuevoAlumno()">
                        <div class="row p-1">
                            <div class="col-3 col-md-2">CODIGO:</div>
                            <div class="col-9 col-md-3">
                                <input required pattern="[A-Z]{4}[0-9]{6}" class="form-control" type="text" v-model="alumno.codigo">
                            </div>
                        </div>
                        <div class="row p-1">
                            <div class="col-3 col-md-2">NOMBRE:</div>
                            <div class="col-9 col-md-6">
                                <input required pattern="[a-zA-Z ]{3,65}" class="form-control" type="text" v-model="alumno.nombre">
                            </div>
                        </div>
                        <div class="row p-1">
                            <div class="col-3 col-md-2">DIRECCION:</div>
                            <div class="col-9 col-md-6">
                                <input  class="form-control" type="text" v-model="alumno.direccion">
                            </div>
                        </div>
                        <div class="row p-1">
                            <div class="col-3 col-md-2">MUNICIPIO:</div>
                            <div class="col-9 col-md-6">
                                <input  class="form-control" type="text" v-model="alumno.municipio">
                            </div>
                        </div>
                        <div class="row p-1">
                            <div class="col-3 col-md-2">DEPARTAMENTO:</div>
                            <div class="col-9 col-md-6">
                                <input  class="form-control" type="text" v-model="alumno.departamento">
                            </div>
                        </div>
                        <div class="row p-1">
                            <div class="col-3 col-md-2">Telefono:</div>
                            <div class="col-9 col-md-6">
                                <input required pattern="[0-9]{8}" class="form-control" type="text" v-model="alumno.telefono" placeholder="78786767">
                            </div>
                        </div>
                        <div class="row p-1">
                            <div class="col-3 col-md-2">FECHA NACIMIENTO:</div>
                            <div class="col-9 col-md-6">
                                <input  class="form-control" type="date" v-model="alumno.fechaNacimiento">
                            </div>
                            <div class="row p-1">
                                <div class="col-3 col-md-2">SEXO:</div>
                                <div class="col-9 col-md-6">
                                    <input  class="form-control" type="text" v-model="alumno.sexo" placeholder="M o F" required pattern="[M,F]{1}">
                                </div>
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
                <div class="card-header">CONSULTA ALUMNOS</div>
                <div class="card-body">
                    <form>
                        <table class="table table-dark table-hover">
                            <thead>
                                <tr>
                                    <th>BUSCAR:</th>
                                    <th colspan="2"><input type="text" @keyup="listar()" v-model="buscar"
                                        class="form-control" placeholder="Busar por nombre" ></th>
                                </tr>
                                <tr>
                                    <th>CODIGO</th>
                                    <th colspan="2">NOMBRE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="alumno in alumnos" @click='modificarAlumno(alumno)' :key="alumno.idAlumno">
                                    <td>{{alumno.codigo}}</td>
                                    <td>{{alumno.nombre}}</td>
                                    <td><button @click.prevent="eliminarAlumno(alumno)" class="btn btn-danger">Eliminar</button></td>
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

    export default{
        data() {
            return {
                buscar  : '',
                alumnos : '',
                accion  : 'nuevo',
                alumnos : [],
                alumno  : {
                    idAlumno : '',
                    codigo : '',
                    nombre : '',
                    direccion : '',
                    municipio : '',
                    departamento : '',
                    telefono : '',
                    fechaNacimiento : '',
                    sexo : '',
                }
            }
        },
        methods:{
            nuevoAlumno(){
                this.accion = 'nuevo';
                this.alumno.idAlumno = '';
                this.alumno.codigo = '';
                this.alumno.nombre = '';
                this.alumno.direccion = '';
                this.alumno.municipio = '';
                this.alumno.departamento = '';
                this.alumno.telefono = '';
                this.alumno.fechaNacimiento = '';
                this.alumno.sexo = '';
            },
            modificarAlumno(alumno){
                this.accion = 'modificar';
                this.alumno = alumno;
            },
            guardarAlumno(){
                if( this.alumno.nombre=='' ||
                this.alumno.codigo=='' ){
                console.log( 'Por favor ingrese los datos correspondientes' );
                return;
                }
                let store = this.abrirStore("tblalumnos", 'readwrite'),
                    method = 'PUT';//actualizar
                if( this.accion==='nuevo' ){
                    method = 'POST';
                    this.alumno.idAlumno = new Date().getTime().toString(16);//las cantidad milisegundos y lo convierte en hexadecimal
                    if (this.alumno.idAlumno === ''){
                        console.log('No se ha creado id para el alumno')
                        return;
                    }
                }

                axios({
                    url : 'alumnos',
                    method,
                    data : this.alumno
                }).then(resp => {
                    console.log(resp);
                }).catch(error => {
                    console.error(error);
                });

                let query = store.put( JSON.parse( JSON.stringify(this.alumno) ));
                query.onsuccess = resp=>{
                    this.nuevoAlumno();
                    this.listar();
                };
                query.onerror = err=>{
                    console.error('ERROR al guardar alumno', err);
                };
            },
            listar(){
                let store = this.abrirStore('tblalumnos', 'readonly'),
                data = store.getAll();
                data.onsuccess = resp=>{
                this.alumnos = data.result
                .filter(alumno=>alumno.nombre.toLowerCase().indexOf(this.buscar.toLowerCase())>-1 ||
                    alumno.codigo.indexOf(this.buscar)>-1);
                };
            },
            eliminarAlumno(alumno){
                if( confirm(`Esta seguro de eliminar el autor ${alumno.nombre}?`)){
                    axios({
                        url     : 'alumnos',
                        method  : 'DELETE',
                        data    : {idAlumno : alumno.idAlumno}

                    }).then(resp => {
                        console.log(resp);
                    }).catch(err => {
                        console.log(err);
                    })
                    let store = this.abrirStore('tblalumnos', 'readwrite'),
                        req = store.delete(alumno.idAlumno);
                    req.onsuccess = res => {
                        this.listar();
                    };
                    req.onerror = err => {
                        console.log("ERROR al eliminar alumno")
                    }
                }
            },
            abrirStore(store, modo) {
                let ltx = db.transaction(store, modo);
                return ltx.objectStore(store);
            },
        },
    }
</script>
