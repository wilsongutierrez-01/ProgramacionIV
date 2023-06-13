@include('header')



<div class="preguntas">
    <div id="question-container">
        <h1>Quiz de Conceptos</h1>

        <h2 id="question"></h2>
        <ul id="answers"></ul>

        <div id="result"></div>

        <button id="submit-btn" style="visibility: hidden" >Volver</button>

    </div>

</div>




<script>
    const questions = [
        {
            question: "¿Qué es como llevar una alcancia pero, a una escala más grande?",
            answers: ["Administración Financiera", "Maletin", "Cuenta de dinero", "Bolsa"],
            correctAnswer: 0
        },
        {
            question: "¿Como se llama al dinero que se gana por hacer tareas?",
            answers: ["Regalo", "Ingresos", "Propinas", "Gastos"],
            correctAnswer: 1
        },
        {
            question: "¿Cual es una parte importante de la administración financiera?",
            answers: ["Comprar", "Estudiar", "Trabajar", "Ahorrar"],
            correctAnswer: 3
        }
    ];

    let currentQuestion = 0;
    let score = 0;

    const questionElement = document.getElementById('question');
    const answersElement = document.getElementById('answers');
    const submitButton = document.getElementById('submit-btn');
    const resultElement = document.getElementById('result');

    function loadQuestion() {
        const question = questions[currentQuestion];

        answersElement.innerHTML = "";
        questionElement.textContent = question.question;

        for (let i = 0; i < question.answers.length; i++) {
        const answer = question.answers[i];
        const li = document.createElement('li');
        li.textContent = answer;
        li.dataset.answerIndex = i;
        li.addEventListener('click', selectAnswer);
        answersElement.appendChild(li);
        }
    }

    function selectAnswer(event) {
        const selectedAnswerIndex = parseInt(event.target.dataset.answerIndex);
        const question = questions[currentQuestion];

        if (selectedAnswerIndex === question.correctAnswer) {
            score++;
        }

        currentQuestion++;

        if (currentQuestion >= questions.length) {
            showResult();
        } else {
            loadQuestion();
        }
    }
    document.getElementById('submit-btn').addEventListener('click', function() {
    window.location.href = 'http://127.0.0.1:8000/juegos'; // Reemplaza 'https://www.tupagina.com' con la URL de tu página principal
});


    function showResult() {
        questionElement.style.display = 'none';
        answersElement.style.display = 'none';
        submitButton.style.visibility = 'visible';

        resultElement.textContent = `¡Has finalizado el quiz! Tu puntuación es ${score} de ${questions.length}`;
    }

    loadQuestion();
</script>





@include('footer')
