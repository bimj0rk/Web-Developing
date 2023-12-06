const question = document.querySelector('#question');
const choices = Array.from(document.querySelectorAll('.choice-text'));
const progressText = document.querySelector('#progressText');
const scoreText = document.querySelector('#score');
const progressBarFull = document.querySelector('#progressBarFull');



let currentQuestion = {},
    acceptingAnswers = true,
    score = 0,
    questionCounter = 0,
    availableQuestions = {},
    questions = [
        {
            question:'How many times should you brush your teeth per day?',
            choice1:'Never',
            choice2:'1',
            choice3:'2',
            choice4:'3',
            answer:3,
        },
        {
            question:'How many bones does an adult human have?',
            choice1:'521',
            choice2:'100',
            choice3:'206',
            choice4:'260',
            answer:3,
        },
        {
            question:'The rib cage protects your:',
            choice1:'Heart',
            choice2:'Liver',
            choice3:'Lungs',
            choice4:'All of the above',
            answer:4,
        },
        {
            question:'This system controls everything you do:',
            choice1:'Nervous system',
            choice2:'Olfactory system',
            choice3:'Respiratory system',
            choice4:'Endocrine system',
            answer:1,
        },
    ];

const SCORE_POINTS=100;
const MAX_QUESTIONS=4;

startQuiz =()=>{
    questionCounter = 0;
    score = 0;
    availableQuestions = [...questions];
    getNewQuestion();

}
getNewQuestion =()=>{
    if(availableQuestions.length == 0 || questionCounter > MAX_QUESTIONS){
        localStorage.setItem('mostRecentScore', score);
        return window.location.assign('end.html');
    }

    questionCounter++;
    progressText.innerText = `Question ${questionCounter} of ${MAX_QUESTIONS}`;
    progressBarFull.style.width = `${(questionCounter/MAX_QUESTIONS)*100}%`;

    const questionIndex=Math.floor(Math.random() * availableQuestions.length);
    currentQuestion = availableQuestions[questionIndex];
    question.innerText = currentQuestion.question;

    choices.forEach(choice=>{
        const number = choice.dataset['number'];
        choice.innerText = currentQuestion['choice' + number];
    })
    availableQuestions.splice(questionIndex, 1);
    acceptingAnswers=true;
}

choices.forEach(choice=>{
    choice.addEventListener('click', e =>{
        if(!acceptingAnswers) return

        acceptingAnswers = false;
        const selectedChoice = e.target;
        const selectedAnswer = selectedChoice.dataset['number'];

        let classToApply = selectedAnswer == currentQuestion.answer ? 'correct': 'incorrect';
        if(classToApply == 'correct'){
            incrementScore(SCORE_POINTS);
        }

        selectedChoice.parentElement.classList.add(classToApply);
        setTimeout(()=>{
            selectedChoice.parentElement.classList.remove(classToApply);
            getNewQuestion();
        },1000)
    })
})

incrementScore = num=>{
    score += num;
    scoreText.innerText=score;
}

startQuiz();