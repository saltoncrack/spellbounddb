const wordText = document.querySelector(".word"),
hintText = document.querySelector(".hint span"),
timeText = document.querySelector(".time b"),
inputField = document.querySelector("input"),
refreshBtn = document.querySelector(".refresh-word"),
checkBtn = document.querySelector(".check-word")

let correctWord, timer;

const initTimer = maxTime => {
    clearInterval(timer);
    timer = setInterval(() => {
        if(maxTime > 0){
            maxTime--;
            return timeText.innerText = maxTime;

        }
        clearInterval(timer);
        alert(`Time over ${correctWord.toUpperCase()} was the correct word`);
        initGame();
    }, 1000)
}

const initGame = () => {
    initTimer(30);
    let randomObj = words [ Math.floor(Math.random () * words.length)]
    let wordArray = randomObj.words.split("");
    for(let i =wordArray.length - 1; i > 0; i--){
        let j =Math.floor(Math.random() * (i+1));
        [wordArray[i], wordArray[j]] = [wordArray[j], wordArray[i]];
    }

    wordText.innerText = wordArray.join("");
    hintText.innerText = randomObj.hint;
    correctWord = randomObj.words.toLowerCase();
    inputField.value = "";
    inputField.setAttribute("Maxlenght", correctWord.length)
    console.log(randomObj);
}

initGame ();

const checkWord = () => {
    let userWord = inputField.value.toLocaleLowerCase();
    if(!userWord) return alert("Please enter to check word");

        if(userWord !== correctWord)
            return alert (`Oops! ${userWord} is not the correct word`);

        alert(`Congrats! ${userWord.toUpperCase()} is the correct word`);
        initGame();
}

refreshBtn.addEventListener("click", initGame);
checkBtn.addEventListener("click", checkWord);