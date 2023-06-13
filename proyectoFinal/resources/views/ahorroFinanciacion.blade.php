@include('header')


  <div class="containerC1">
    <div class="tittle">
      <h1>Ahorro y Financiación</h1>
    </div>
    <div class="card">
      <h2>1. Ahorro</h2>
      <p>
        El ahorro es una forma inteligente de manejar tu dinero. Cuando ahorras, pones dinero de lado en lugar de gastarlo de inmediato. Aquí hay algunas cosas importantes que debes saber sobre el ahorro:
      </p>
      <ul>
        <li onclick="toggleContent(this)">El ahorro te ayuda a alcanzar tus metas.</li>
        <div class="contentPA"> Puedes ahorrar para comprar algo especial, como un juguete, un libro o incluso para hacer un viaje.</div>
        <li onclick="toggleContent(this)">La importancia de guardar dinero.</li>
        <div class="contentPA">  Al ahorrar, estás guardando parte de tu dinero para usarlo más adelante cuando realmente lo necesites.</div>
        <li onclick="toggleContent(this)">Establecer metas de ahorro.</li>
        <div class="contentPA"> Es útil tener metas de ahorro claras, como ahorrar una cierta cantidad de dinero cada mes para comprar algo específico.</div>
        <li onclick="toggleContent(this)">Formas de ahorrar.</li>
        <div class="contentPA"> Puedes ahorrar dinero en una alcancía, una cuenta de ahorros en el banco o incluso utilizando una aplicación de ahorro.</div>
      </ul>
    </div>
    <div class="card">
      <h2>2. Plan de Ahorro</h2>
      <p>
        Un plan de ahorro es una estrategia que te ayuda a ahorrar de manera organizada y alcanzar tus objetivos. Aquí te mostramos cómo crear un plan de ahorro:
      </p>
      <ol>
        <li onclick="toggleContent(this)">Establecer una meta.</li>
        <div class="contentPA"> Decide cuánto dinero quieres ahorrar y para qué lo estás ahorrando. Puede ser para comprar un videojuego, un gadget o cualquier otra cosa que desees.</div>
        <li onclick="toggleContent(this)">Calcular el tiempo.</li>
        <div class="contentPA">Determina en cuánto tiempo deseas alcanzar tu meta de ahorro. Puede ser en semanas, meses o incluso años.</div>
        <li onclick="toggleContent(this)">Crear un presupuesto.</li>
        <div class="contentPA">Aprende a administrar tu dinero asignando una parte de tus ingresos al ahorro. Esto significa que debes separar una cantidad fija de dinero para ahorrar regularmente.</div>
        <li onclick="toggleContent(this)">Seguir tu progreso.</li>
        <div class="contentPA">Lleva un registro de cuánto dinero has ahorrado y cuánto te falta para alcanzar tu meta. Esto te ayudará a mantenerte motivado y a saber cuánto progreso has hecho.</div>
      </ol>
    </div>
    <div class="card">
      <h2>3. Diferencia entre Ahorro y Financiación</h2>
      <p>
        Es importante entender la diferencia entre ahorro y financiación:
      </p>
      <ul>
        <li onclick="toggleContent(this)">Ahorro: Guardar dinero para usarlo en el futuro.</li>
        <div class="contentPA"></div>
        <li onclick="toggleContent(this)">Financiación: Obtener dinero prestado para comprar algo y pagarlo en cuotas o a lo largo del tiempo.</li>
        <div class="contentPA"></div>
      </ul>
      <p>
        El ahorro te permite comprar algo cuando tienes suficiente dinero ahorrado, mientras que la financiación te permite comprar algo de inmediato y pagarlo a lo largo del tiempo.
      </p>
    </div>
  </div>

<script>
    function toggleContent(element) {
        var content = element.nextElementSibling;
        if (content.style.display === "none") {
            content.style.display = "block";
        } else {
            content.style.display = "none";
        }
    }
</script>

@include('footer')
