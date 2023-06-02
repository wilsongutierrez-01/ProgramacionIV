<template>
    <form method="POST" action="{{ route('perfil.actualizar') }}" class="mt-4 formulario-ninos">
       <h3> @csrf</h3>
        @method('PUT')

        <div class="form-group">
            <label for="name">Nombre de usuario</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name ?? '' }}">
        </div>

        <div class="form-group">
            <label for="lastname">Apellido de usuario</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $user->lastname ?? '' }}">
        </div>

        <div class="form-group">
            <label for="email">Correo</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email ?? '' }}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
        <transition>
            <a href="/logout" class="btn-cerrar-sesion">cerrar sesion</a>
        </transition>

    </form>


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
