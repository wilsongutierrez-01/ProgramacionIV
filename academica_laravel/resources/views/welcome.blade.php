<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>::.. SISTEMA ACADEMICO UGB ..::</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://unpkg.com/vue-select@3.0.0/dist/vue-select.css">
    </head>
    <body>
         <!-- Contenido de la pagina html -->
        <div class="container-fluid" id="app">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">::.. SISTEMA ACADEMICO ..::</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="npofalse"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link" @click="abrirFormulario('alumno')" href="#">Alumnos</a>
                            <a class="nav-link" @click="abrirFormulario('docente')" href="#">Docentes</a>
                            <a class="nav-link" @click="abrirFormulario('materia')" href="#">Materia</a>
                            <a class="nav-link" @click="abrirFormulario('matricula')" href="#">Matricula</a>
                            <a class="nav-link" @click="abrirFormulario('inscripcion')" href="#">Inscripcion</a>
                        </div>
                    </div>
                </div>
            </nav>
            <div id="sistemApp">
                <alumno ref="alumno" v-show="forms['alumno'].mostrar"></alumno>
                <docente ref="docente" v-show="forms['docente'].mostrar"></docente>
                <materia ref="materia" v-show="forms['materia'].mostrar"></materia>
                <matricula ref="matricula" v-show="forms['matricula'].mostrar"></matricula>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script> NO soporta SFC con la CDN -->
        {{-- <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script> --}}
        <script src="https://unpkg.com/vue-select@3.0.0"></script>

        @vite('resources/js/app.js')
    </body>
</html>
