const dice = document.getElementById('dice');
const rollBtn = document.getElementById('btnRoll');
let resultContainer = document.getElementById("result");

const randomDice = () => {

    const random = Math.floor(Math.random() * 10);

    if (random >= 1 && random <= 6) {
        rollDice(random);
        console.log("Valor Sorteado: ", random);
    }
    else {
        randomDice();
    }
}

const rollDice = random => {

    dice.style.animation = 'rolling 4s';

    setTimeout(() => {
        switch (random) {
            case 1:
                dice.style.transform = 'rotateX(0deg) rotateY(0deg)';
                resultContainer.textContent = `Que pena... Você tirou ${random}.`
                break;
            case 2:
                dice.style.transform = 'rotateX(-90deg) rotateY(0deg)';
                resultContainer.textContent = `Que pena... Você tirou ${random}.`
                break;
            case 3:
                dice.style.transform = 'rotateX(0deg) rotateY(90deg)';
                resultContainer.textContent = `Que pena... Você tirou ${random}.`
                break;
            case 4:
                dice.style.transform = 'rotateX(0deg) rotateY(-90deg)';
                resultContainer.textContent = `Que pena... Você tirou ${random}.`
                break;
            case 5:
                dice.style.transform = 'rotateX(90deg) rotateY(0deg)';
                resultContainer.textContent = `Parabéns! Você tirou ${random}.`
                break;
            case 6:
                dice.style.transform = 'rotateX(180deg) rotateY(0deg)';
                resultContainer.textContent = `Parabéns! Você tirou ${random}.`
                break;
            default:
                break;
        }
        dice.style.animation = 'none';
    }, 4050);
}

rollBtn.addEventListener('click', randomDice);
