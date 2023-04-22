<template>
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">REGISTRO DE MATERIA</div>
                <div class="card-body">
                    <form id="frmMateria" @reset.prevent="nuevoMateria" v-on:submit.prevent="guardarMateria">
                        <div class="row p-1">
                            <div class="col-3 col-md-2">
                                <label for="txtCodigoMateria">CODIGO:</label>
                            </div>
                            <div class="col-3 col-md-3">
                                <input required pattern="[0-9]{3}"
                                    title="Ingrese un codigo de materia de 3 digitos"
                                        v-model="materia.codigo" type="text" class="form-control" name="txtCodigoMateria" id="txtCodigoMateria">
                            </div>
                        </div>
                        <div class="row p-1">
                            <div class="col-3 col-md-2">
                                <label for="txtNombreMateria">NOMBRE:</label>
                            </div>
                            <div class="col-9 col-md-6">
                                <input required pattern="[A-Za-zÑñáéíóú ]{3,75}"
                                    v-model="materia.nombre" type="text" class="form-control" name="txtNombreMateria" id="txtNombreMateria">
                            </div>
                        </div>
                        <div class="row p-1">
                            <div class="col-3 col-md-3">
                                <input class="btn btn-primary" type="submit"
                                    value="Guardar">
                            </div>
                            <div class="col-3 col-md-3">
                                <input class="btn btn-warning" type="reset" value="Nuevo">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">LISTADO DE MATERIAS</div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>BUSCAR:</th>
                                <th colspan="2"><input type="text" class="form-control" v-model="buscar"
                                    @keyup="listar()"
                                    placeholder="Buscar por codigo o nombre"></th>
                            </tr>
                            <tr>
                                <th>CODIGO</th>
                                <th colspan="2">NOMBRE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="materia in materias" :key="materia.idMateria" @click="modificarMateria(materia)" >
                                <td>{{ materia.codigo }}</td>
                                <td>{{ materia.nombre }}</td>
                                <td><button class="btn btn-danger" @click="eliminarMateria(materia)">ELIMINAR</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                accion:'nuevo',
                buscar: '',
                materias: [],
                materia:{
                    idMateria : '',
                    codigo : '',
                    nombre : '',
                }
            }
        },
        methods:{

        },
    }
</script>

