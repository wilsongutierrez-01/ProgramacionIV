

@include('header')


    <div class="containerC1">
        <h1>¡Aprende sobre la administración financiera!</h1>

        <br>

        <div class="mediaV">

            <video src="/videos/video.mp4" controls autoplay>
                Tu navegador no soporta el elemento de video.
            </video>

        </div>


        <div class="card" >
    <h2 onclick="toggleContent(this)">¿Qué es la administración financiera?</h2>
    <p class="contentP">La administración financiera es como llevar una alcancía, pero a una escala más grande. Es el arte de manejar el dinero y los recursos de manera inteligente. Consiste en tomar decisiones sobre cómo ganar, gastar, ahorrar e invertir el dinero.</p>
        </div>

        <div class="card">
    <h2 onclick="toggleContent(this)">Ingresos y gastos</h2>
    <p class="contentP" style="display:none;">Los ingresos son el dinero que ganas, como mesadas, regalos o dinero que recibes por hacer tareas. Los gastos son el dinero que gastas en cosas como juguetes, dulces o actividades divertidas. Es importante tener un equilibrio entre los ingresos y los gastos.</p>
    </div>

    <div class="card">
        <h2 onclick="toggleContent(this)">Ahorrar</h2>
        <p class="contentP">El ahorro es una parte importante de la administración financiera. Significa guardar dinero para usarlo más adelante en algo que realmente deseas. Puedes ahorrar una parte de tus ingresos en una alcancía o en una cuenta de ahorros. ¡Verás cómo tu dinero crece con el tiempo!</p>
        </div>

        <div class="card">
            <h2 onclick="toggleContent(this)">Presupuesto</h2>
            <p class="contentP">Un presupuesto es un plan que te ayuda a administrar tu dinero de manera inteligente. Puedes hacer un presupuesto asignando una cantidad específica de dinero para diferentes categorías, como juguetes, libros o actividades recreativas. Esto te ayudará a controlar tus gastos y asegurarte de no gastar más de lo que ganas.</p>
            </div>


        <div class="card">
            <h2 onclick="toggleContent(this)">Inversiones</h2>
            <p class="contentP">Las inversiones son una forma de hacer que tu dinero trabaje para ti. Puedes invertir en algo que pueda crecer en valor con el tiempo, como una hucha cerdito que guarda monedas, acciones de una empresa ficticia o incluso en una mini empresa de limonada. Recuerda que las inversiones tienen riesgos, así que investiga antes de tomar decisiones.</p>
            </div>

        <div class="card">
            <h2 onclick="toggleContent(this)">Ser generoso</h2>
            <p class="contentP">Parte de la administración financiera también implica ser generoso y ayudar a los demás. Puedes donar una parte de tus ingresos o usar tu dinero para apoyar una causa que te importe, como donar juguetes a niños necesitados. ¡Recuerda que dar puede hacerte sentir muy bien!</p>
            </div>
        <div class="card">
            <a class="btn-regresar" href="/ahorroF">Siguiente</a>
        </div>
        <div class="card">
            <a class="btn-regresar" href="/dashboard">Regresar</a>
        </div>




    <script>
        function toggleContent(element){
            var content = element.nextElementSibling;
            if (content.style.display === "none") {
                content.style.display = "block";
            } else {
                content.style.display = "none";
            }
        }
    </script>
@include('footer')
