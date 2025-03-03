const dice = document.getElementById('dice');
const rollBtn = document.getElementById('btnRoll');
let resultContainer = document.getElementById("result");
const successRedirectUrl = document.getElementById('successRedirectUrl').value;

const randomDice = () => {
    const random = Math.floor(Math.random() * 10);

    if (random >= 1 && random <= 6) {
        rollDice(random);
        console.log("Valor Sorteado: ", random);
        sendDiceResult(random, false); // Envia o resultado para o PHP
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
                resultContainer.textContent = `Que pena... Você tirou ${random}.`;
                break;
            case 2:
                dice.style.transform = 'rotateX(-90deg) rotateY(0deg)';
                resultContainer.textContent = `Que pena... Você tirou ${random}.`;
                break;
            case 3:
                dice.style.transform = 'rotateX(0deg) rotateY(90deg)';
                resultContainer.textContent = `Que pena... Você tirou ${random}.`;
                // Rolar o dado novamente
                setTimeout(() => {
                    randomDice();
                }, 2000); // Espera 2 segundos antes de rolar novamente
                break;
            case 4:
                dice.style.transform = 'rotateX(0deg) rotateY(-90deg)';
                resultContainer.textContent = `Parabéns! Você tirou ${random}.`;
                break;
            case 5:
                dice.style.transform = 'rotateX(90deg) rotateY(0deg)';
                resultContainer.textContent = `Parabéns! Você tirou ${random}.`;
                break;
            case 6:
                dice.style.transform = 'rotateX(180deg) rotateY(0deg)';
                resultContainer.textContent = `Parabéns! Você tirou ${random}.`;
                break;
            default:
                break;
        }
        dice.style.animation = 'none';
    }, 4050);
}

const sendDiceResult = (result, isSecondRoll) => {
    const successRedirectUrl = document.getElementById('successRedirectUrl').value;

    // Log para depuração
    console.log("URL de sucesso capturada:", successRedirectUrl);

    fetch('/PROJETO-LIFE-1/forms/process_dice.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ 
            diceResult: result, 
            isSecondRoll: isSecondRoll,
            successRedirectUrl: successRedirectUrl
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Erro na requisição: ' + response.statusText);
        }
        return response.json();
    })
    .then(data => {
        console.log("Resposta do PHP:", data);
        if (data.redirect) {
            console.log("Redirecionando para:", data.redirect); // Log para depuração
            window.location.href = data.redirect;
        }
    })
    .catch(error => {
        console.error('Erro:', error);
    });
};
rollBtn.addEventListener('click', randomDice);