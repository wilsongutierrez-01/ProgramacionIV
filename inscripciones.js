Vue.component('inscripciones',{
    data() {
        return {
            buscar : '',
            accion : '',
            inscripciones : [],
            inscripcion : {
                idInscripcion: '',
                icodigo : '',
                inombre : '',
                itelefono : '',
            } 
        }
    },
    methods:{
        nuevoAlumno(){
            this.accion = 'nuevo';
            this.inscripcion.idInscripcion = '';
            this.inscripcion.icodigo = '';
            this.inscripcion.inombre = '';
            this.inscripcion.itelefono = '';
        },
        modificarAlumno(inscripcion){
            this.accion = 'modificar';
            this.inscripcion = inscripcion;
        },
        guardarAlumno(){
            if( this.codigo == '' ){
            console.log( 'Por favor primero agregue al estudiante' );
            return;
            }
            let store = this.abrirStore("tblinscripciones", 'readwrite');
            if( this.accion==='nuevo' ){
                this.inscripcion.idInscripcion = new Date().getTime().toString(16);//las cantidad milisegundos y lo convierte en hexadecimal   
            }
            let query = store.put( JSON.parse( JSON.stringify(this.inscripcion) ));
            query.onsuccess = resp=>{
                this.comparar(this.inscripcion.icodigo);
                this.nuevoAlumno();
                this.listar();
            };
            query.onerror = err=>{
                console.error('ERROR al inscribir alumno', err);
            };
        },
        listar(){
            let store = this.abrirStore('tblinscripciones', 'readonly'),
            data = store.getAll();
            data.onsuccess = resp=>{
            this.inscripciones = data.result
            .filter(inscripcion=>inscripcion.inombre.toLowerCase().indexOf(this.buscar.toLowerCase())>-1 || 
                inscripcion.icodigo.indexOf(this.buscar)>-1);
            };
        },
        comparar(code){
            var objectStore = this.abrirStore('tblalumnos', 'readonly');
            var request = objectStore.get(code);
            request.onerror = function(event){
                console.log('errores')
            };
            request.onsuccess = function(event){
                    console.log(request.result.codigo);

                return request.result.codigo;
            
            };
        },
        eliminarAlumno(inscripcion){
            if( confirm(`Esta seguro de eliminar el autor ${inscripcion.nombre}?`)){
                let store = this.abrirStore('tblinscripciones', 'readwrite'),
                    req = store.delete(inscripcion.idInscripcion);
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
    template: `
    <div class="row">
    <div class="col-12 col-md-6">
        <div class="card border-primary">
            <div class="card-header bg-primary text-white">REGISTRAR ALUMNOS</div>
            <div class="card-body">
                <form id="frmInscripcion" @submit.prevent="guardarAlumno" @reset.prevent="nuevoAlumno()" >
                    <div class="row p-1">
                    <div class="col-3 col-md-3">CODIGO:</div>
                    <div class="col-9 col-md-3">
                        <input required pattern="[A-Z]{4}[0-9]{6}" class="form-control" type="text" v-model="inscripcion.icodigo"  placeholder="Codigo" >
                    </div>
                </div>
                    <div class="row p-1">
                        <div class="col-3 col-md-3">NOMBRE:</div>
                        <div class="col-9 col-md-6">
                            <input required pattern="[a-zA-Z ]{3,65}" class="form-control" type="text" v-model="inscripcion.inombre" >
                        </div>
                    </div>
                    <div class="row p-1">
                        <div class="col-3 col-md-3">Telefono:</div>
                        <div class="col-9 col-md-3">
                            <input  class="form-control" type="text" v-model="inscripcion.itelefono">
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
            <div class="card-header">ALUMNOS INSCRITOS</div>
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
                            <tr v-for="inscripcion in inscripciones" @click='modificarAlumno(inscripcion)' :key="inscripcion.idInscripcion">
                                <td>{{inscripcion.icodigo}}</td>
                                <td>{{inscripcion.inombre}}</td>
                                <td><button @click.prevent="eliminarAlumno(inscripcion)" class="btn btn-danger">Eliminar</button></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
    `
});