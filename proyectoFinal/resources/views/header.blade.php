<!DOCTYPE html>
<html>
<head>
    <title>Educame</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>

</head>
<body>
<!-- header.blade.php -->

<div class="container-fluid" id="app">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/perfil">
                {{-- <img src="images/backgr.jpg" alt="Logo" style="width: 175px; height: 100px;"> --}}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="/conten1">Contenido 1</a>
                    <a class="nav-link" href="/conten2">Contenido 2</a>
                    <a class="nav-link" href="/conten3">Contenido 3</a>
                    <a class="nav-link" href="/juegos">Juegos</a>
                    <a class="nav-link" href="/chat">Chat</a>
                    <a class="nav-link"  href="/acercade">Acerca de</a>
                </div>
            </div>
        </div>
    </nav>
    <div id="sistemApp">
        <inicio ref="#" v-show="forms['inicio'].mostrar"></inicio>
        {{-- <docente ref="#" v-show="forms['docente'].mostrar"></docente>
        <materia ref="#" v-show="forms['materia'].mostrar"></materia>
        <matricula ref="#" v-show="forms['matricula'].mostrar"></matricula>
        <inscripcion ref="#" v-show="forms['inscripcion'].mostrar"></inscripcion> --}}
    </div>
</div>

