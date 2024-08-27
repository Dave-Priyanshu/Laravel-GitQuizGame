document.addEventListener('DOMContentLoaded', () => {
    const questionElem = document.getElementById('question');
    const userAnswer = document.getElementById('user-answer');
    const message = document.getElementById('message');
    const submitBtn = document.getElementById('submit-btn');
    const helpBtn = document.getElementById('help-btn');
    const hintBtn = document.getElementById('hint-btn');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    const scoreElem = document.getElementById('score');
    const loading = document.querySelector('.loading');
    const content = document.querySelector('.content');

    let questions = [];
    let currentQuestionIndex = 0;
    let questionAnswered = {};
    let userScore = 0;

    function loadQuestion(index) {
        if (index >= 0 && index < questions.length) {
            questionElem.textContent = questions[index].question;
            userAnswer.value = '';
            message.textContent = '';
            prevBtn.style.display = index > 0 ? 'inline-block' : 'none';
            nextBtn.style.display = (index in questionAnswered && questionAnswered[index]) ? (index < questions.length - 1 ? 'inline-block' : 'none') : 'none';
        }
    }

    function updateScore() {
        userScore++;
        localStorage.setItem('userScore', userScore); // Store the updated score in localStorage
        scoreElem.textContent = `Score: ${userScore}`;
    }

    function fetchQuestions() {
        fetch('/questions')
            .then(response => response.json())
            .then(data => {
                questions = data;

                const storedIndex = parseInt(localStorage.getItem('currentQuestionIndex'), 10);
                currentQuestionIndex = (!isNaN(storedIndex) && storedIndex >= 0 && storedIndex < questions.length) ? storedIndex : 0;

                const storedScore = parseInt(localStorage.getItem('userScore'), 10);
                userScore = (!isNaN(storedScore)) ? storedScore : 0;
                scoreElem.textContent = `Score: ${userScore}`;

                loadQuestion(currentQuestionIndex);
                content.style.display = 'block';
                loading.style.display = 'none';
            })
            .catch(error => {
                console.error('Error fetching questions:', error);
                message.textContent = "Error loading questions.";
                message.style.color = "red";
                content.style.display = 'none';
                loading.style.display = 'none';
            });
    }

    submitBtn.addEventListener('click', () => {
        const currentQuestion = questions[currentQuestionIndex];
        if (userAnswer.value.trim().toLowerCase() === currentQuestion.answer.toLowerCase()) {
            message.textContent = "The answer is right!";
            message.style.color = "green";
            questionAnswered[currentQuestionIndex] = true;
            updateScore();
            if (currentQuestionIndex < questions.length - 1) {
                nextBtn.style.display = 'inline-block';
            }
        } else {
            message.textContent = "The answer is incorrect. Try again.";
            message.style.color = "red";
            nextBtn.style.display = 'none';
        }
    });

    helpBtn.addEventListener('click', () => {
        const helpUrl = `/help?index=${currentQuestionIndex}`;
        window.location.href = helpUrl;
    });

    hintBtn.addEventListener('click', () => {
        message.textContent = `Hint: ${questions[currentQuestionIndex].answer}`;
        message.style.color = "blue";
        setTimeout(() => {
            message.textContent = "";
        }, 3000);
    });

    prevBtn.addEventListener('click', () => {
        if (currentQuestionIndex > 0) {
            currentQuestionIndex--;
            loadQuestion(currentQuestionIndex);
            localStorage.setItem('currentQuestionIndex', currentQuestionIndex);
        }
    });

    nextBtn.addEventListener('click', () => {
        if (currentQuestionIndex < questions.length - 1) {
            currentQuestionIndex++;
            loadQuestion(currentQuestionIndex);
            localStorage.setItem('currentQuestionIndex', currentQuestionIndex);
        }
    });

    // Only reset if it's a brand new user session
    if (sessionStorage.getItem('isNewUser')) {
        localStorage.removeItem('currentQuestionIndex');
        localStorage.removeItem('userScore');
        sessionStorage.removeItem('isNewUser');
    }

    // Fetch questions and restore the current state
    fetchQuestions();
});
