Vue.component('component-inscripciones',{
    data() {
        return {
            inombre : '',
            icodigo: '',
            accion:'nuevo',
            buscar: '',
            alumnos : [],
            alumno : {
                idAlumno : '',
                codigo : '',
                nombre : '',
                direccion : '',
                municipio : '',
                departamento : '',
                telefono : '',
                fechaNacimiento : '',
                sexo : '',
            } ,
            inscripciones : [],
            inscripcion : {
                idInscripcion : '',
                codigoAlumno : '',
                nombreAlumno : '',
            }
        }
    },
    methods:{

        inscribirAlumnos(alumno){
            if( confirm(`Esta seguro de inscribir a ${alumno.nombre}?`)){
                let store = this.abrirStore('tblinscripciones', 'readwrite');
                if(this.accion==='nuevo'){
                    this.inscripcion.idInscripcion = new Date().getTime.toString(16);
                }
                let query = store.put(JSON.parse(JSON.stringify(this.inscripcion)));
                query.onsuccess = res => {
                    this.nuevoInscripcion();
                    this.listar();
                };
                req.onerror = err => {
                    console.log("ERROR al inscribir alumno")
                }
            }
        },
        inscribirAlumno(alumno){
            if( confirm(`Esta seguro de inscribir a ${alumno.nombre}`)){
                let store = this.abrirStore("tblinscripciones", 'readwrite');
            if( this.accion==='nuevo' ){
                this.inscripcion.idInscripcion = new Date().getTime().toString(16);//las cantidad milisegundos y lo convierte en hexadecimal   
            }
            let query = store.put( JSON.parse( JSON.stringify(this.inscripcion) ));
            query.onsuccess = resp=>{
                
                this.listarInscritos();
            };
            query.onerror = err=>{
                console.error('ERROR al guardar alumno', err);
            };
            }
            

        },
        nuevoInscripcion(){
            this.accion = 'nuevo';
            this.inscripcion.idInscripcion = '';
            this.inscripcion.codigo = '';
            this.inscripcion.nombre = '';
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
        listarInscritos(){
            let store = this.abrirStore('tblinscripciones', 'readonly'),
            data = store.getAll();
            data.onsuccess = resp=>{
            this.inscripciones = data.result
            .filter(inscripcion=>inscripcion.nombre.toLowerCase().indexOf(this.buscar.toLowerCase())>-1 || 
                inscripcion.codigo.indexOf(this.buscar)>-1);
            };
        },
        abrirStore(store, modo) {
            let ltx = db.transaction(store, modo);
            return ltx.objectStore(store);
        },
    },
    template: `
    <div class="row">
    <div class="col-12 col-md-6">
    <div class="card text-bg-light">
        <div class="card-header">INSCRIPCIONES</div>
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
                        <tr v-for="alumno in alumnos" :key="alumno.idAlumno">
                            <td>{{alumno.codigo}}</td>
                            <td>{{alumno.nombre}}</td>
                            <td>
                                
                                <button @click.prevent="inscribirAlumno(alumno)" class="btn btn-warning">Inscribir</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="card text-bg-light">
            <div class="card-header">INSCRIPCIONES</div>
            <div class="card-body">
                <form>
                    <table class="table table-dark table-hover">
                        <thead>
                            <tr>
                                <th>BUSCAR:</th>
                                <th colspan="2"><input type="text" @keyup="listarInscritos()" v-model="buscar" 
                                    class="form-control" placeholder="Busar por nombre" ></th>
                            </tr>
                            <tr>
                                <th>CODIGO</th>
                                <th colspan="2">NOMBRE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="inscripcion in inscripciones" :key="inscripcion.idInscripciones">
                                <td>{{inscripcion.idInscripcion}}</td>
                                <td>{{inscripcion.nombre}}</td>
                                <td>
                                    
                                    <button  class="btn btn-success">Inscrito</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
        </div>
        </div>
    </div>

    `
});