@include('header')


  <div class="containerC1">
    <div class="tittle">
      <h1>Ahorro y Financiación</h1>
    </div>
    <div class="card">
      <h2> Ahorro</h2>
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
      <h2>Plan de Ahorro</h2>
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
        <h2>Financiación</h2>
        <p>
            La financiación es otra forma de obtener dinero para comprar algo que deseas, incluso si no tienes suficiente dinero ahorrado en ese momento. Aquí te explico cómo funciona:
        </p>
        <ul>
            <li onclick="toggleContent(this)">Pedir prestado dinero.</li>
            <div class="contentPA">Cuando no tienes suficiente dinero para comprar algo, puedes pedir prestado dinero a alguien más, como un banco o una tienda. Es como pedirle a alguien que te preste dinero para que puedas comprar lo que deseas.</div>
            <li onclick="toggleContent(this)">Pagando en cuotas.</li>
            <div class="contentPA">Cuando obtienes un préstamo, acuerdas devolver el dinero prestado en cuotas. Esto significa que pagas una parte del dinero prestado cada mes hasta que hayas pagado todo lo que debes. Por ejemplo, si obtienes un préstamo para comprar un juguete de 100 dólares y acuerdas pagarlo en 10 cuotas mensuales, pagarías 10 dólares cada mes.</div>
            <li onclick="toggleContent(this)">Intereses.</li>
            <div class="contentPA">Además de devolver el dinero prestado, generalmente tienes que pagar un poco más de dinero llamado "intereses". Los intereses son como una pequeña cantidad extra que pagas por el préstamo. Es importante tener en cuenta los intereses al decidir si pedir un préstamo es una buena opción para ti.</div>
            <li onclick="toggleContent(this)">Evaluar las opciones.</li>
            <div class="contentPA">Antes de decidir financiar una compra, es importante evaluar si puedes pagar las cuotas mensuales y si los intereses adicionales valen la pena. A veces, la financiación puede ser útil si necesitas algo de inmediato, pero también debes considerar si es mejor ahorrar para comprarlo en el futuro sin tener deudas.</div>
        </ul>
    </div>
    <div class="card">
      <h2>Diferencia entre Ahorro y Financiación</h2>
      <p>
        Es importante entender la diferencia entre ahorro y financiación:
      </p>
        <p>Ahorro: Guardar dinero para usarlo en el futuro.</p>

        <p>Financiación: Obtener dinero prestado para comprar algo y pagarlo en cuotas o a lo largo del tiempo.</p>

      <p>
        El ahorro te permite comprar algo cuando tienes suficiente dinero ahorrado, mientras que la financiación te permite comprar algo de inmediato y pagarlo a lo largo del tiempo.
      </p>
    </div>
    <div class="tittle">
        <h1>Aprendamos más sobre ahorro</h1>
      </div>
    <div class="mediaV">

        <video controls >
            <source src="/videos/ahorro.mp4" type="video/mp4">
            Tu navegador no soporta el elemento de video.
        </video>

    </div>
    <div class="card">
        <a class="btn-regresar" href="/conten1">Regresar</a>
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
