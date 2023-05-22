<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

            <!-- Contenido de la pagina html -->
            <div class="container-fluid" id="app">
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Educame</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="npofalse"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-link" @click="abrirFormulario('alumno')" href="#">Inicio</a>
                                <a class="nav-link" @click="abrirFormulario('docente')" href="#">Contenido 1</a>
                                <a class="nav-link" @click="abrirFormulario('materia')" href="#">Contenido 2</a>
                                <a class="nav-link" @click="abrirFormulario('matricula')" href="#">Contenido 3</a>
                                <a class="nav-link" @click="abrirFormulario('matricula')" href="#">Juegos</a>
                                <a class="nav-link" @click="abrirFormulario('inscripcion')" href="#">Acerca de</a>
                            </div>
                        </div>
                    </div>
                </nav>
                <div id="sistemApp">
                    <alumno ref=#" v-show="forms['alumno'].mostrar"></alumno>
                    <docente ref="#" v-show="forms['docente'].mostrar"></docente>
                    <materia ref="#" v-show="forms['materia'].mostrar"></materia>
                    <matricula ref="#" v-show="forms['matricula'].mostrar"></matricula>
                    <inscripcion ref="#" v-show="forms['inscripcion'].mostrar"></inscripcion>
                </div>
            </div>

            <div>
                <br>
            </div>
    <h2>Bienvenido a Educame</h2>


    <a href="/logout" class="btn btn-danger">cerrar sesion</a>

    {{-- <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form> --}}
</body>
</html>
