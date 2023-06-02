<template>
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">REGISTRO DE DOCENTE</div>
                <div class="card-body">
                    <form id="frmDocente" @reset.prevent="nuevoDocente" v-on:submit.prevent="guardarDocente">
                        <div class="row p-1">
                            <div class="col-3 col-md-2">
                                <label for="txtCodigoDocente">CODIGO:</label>
                            </div>
                            <div class="col-3 col-md-3">
                                <input required pattern="[0-9]{3}"
                                    title="Ingrese un codigo de docente de 3 digitos"
                                        v-model="docente.codigo" type="text" class="form-control" name="txtCodigoDocente" id="txtCodigoDocente">
                            </div>
                        </div>
                        <div class="row p-1">
                            <div class="col-3 col-md-2">
                                <label for="txtNombreDocente">NOMBRE:</label>
                            </div>
                            <div class="col-9 col-md-6">
                                <input required pattern="[A-Za-zÑñáéíóú ]{3,75}"
                                    v-model="docente.nombre" type="text" class="form-control" name="txtNombreDocente" id="txtNombreDocente">
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
    </div>

</template>

<script>
import axios from 'axios';
    export default{
        data(){
            return{
                accion:'nuevo',
                buscar: '',
                docentes: [],
                docente:{
                    idDocente : '',
                    codigo : '',
                    nombre : '',
                    }

            }
        },
        methods:{

                },
    }
</script>
