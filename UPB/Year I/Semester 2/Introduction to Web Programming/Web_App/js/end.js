const username = document.querySelector('#username'),
    saveScoreBtn = document.querySelector('#saveScoreBtn'),
    finalScore = document.querySelector('#finalScore'),
    mostRecentScore = localStorage.getItem('mostRecentScore'),
    highScores = JSON.parse(localStorage.getItem('highScores')) || []
    MAX_HIGH_SCORES = 5;

username.addEventListener('keyup',()=>{
    saveScoreBtn.disabled = !username.value;
})

saveHighScore = e=>{
    e.preventDefault()
    const score = {
        score: mostRecentScore,
        name: username.value
    }

    highScores.push(score);

    highScores.sort((a,b)=>{
        return b.score - a.score;
    })
    highScores.splice(5)
    
    localStorage.setItem('highScores', JSON.stringify(highScores));
    window.location.assign('index.html');
}
