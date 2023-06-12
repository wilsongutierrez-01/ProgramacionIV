@include('header')
<!DOCTYPE html>
<html>
<head>
  <title>Mini juego tipo quiz</title>
</head>
<body>
  <h1>Mini juego tipo quiz</h1>

  <div id="question-container">
    <h2 id="question"></h2>
    <ul id="answers"></ul>
  </div>

  <button id="submit-btn">Enviar respuesta</button>

  <div id="result"></div>

  <script>
    const questions = [
      {
        question: "¿Cuál es la capital de Francia?",
        answers: ["París", "Londres", "Madrid", "Berlín"],
        correctAnswer: 0
      },
      {
        question: "¿Cuál es el río más largo del mundo?",
        answers: ["Amazonas", "Nilo", "Yangtsé", "Misisipi"],
        correctAnswer: 1
      },
      {
        question: "¿Quién pintó la Mona Lisa?",
        answers: ["Leonardo da Vinci", "Pablo Picasso", "Vincent van Gogh", "Claude Monet"],
        correctAnswer: 0
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

      questionElement.textContent = question.question;
      answersElement.innerHTML = "";

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

    function showResult() {
      questionElement.style.display = 'none';
      answersElement.style.display = 'none';
      submitButton.style.display = 'none';

      resultElement.textContent = `¡Has finalizado el quiz! Tu puntuación es ${score} de ${questions.length}`;
    }

    loadQuestion();
  </script>
</body>
</html>




@include('footer')
