const dice = document.getElementById('dice');
const rollBtn = document.getElementById('btnRoll');
let resultContainer = document.getElementById("result");
const randomDice = () => {
    const random = Math.floor(Math.random() * 10);

    if (random >= 1 && random <= 6) {
        rollDice(random);
        console.log("Valor Sorteado: ", random);
        sendResultToServer(random); // Envia o resultado para o servidor
    } else {
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

const sendResultToServer = (result) => {
    fetch('/PROJETO-LIFE-1/forms/process_dice.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ diceResult: result }),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok.');
        }
        return response.text(); // First, get the response as text
    })
    .then(text => {
        try {
            const data = JSON.parse(text); // Try to parse it as JSON
            if (data.success) {
                window.location.href = data.redirectUrl;
            } else {
                alert(data.message);
            }
        } catch (error) {
            console.error('Server returned invalid JSON:', text);
            alert('An error occurred. Please try again.');
        }
    })
    .catch((error) => {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
    });
};

rollBtn.addEventListener('click', randomDice);