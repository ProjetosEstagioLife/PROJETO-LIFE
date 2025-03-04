let chestWindow = document.getElementById("chestWindow");
let chest = document.getElementById("chest");
let rewardWindow = document.getElementById("rewardWindow");
let transition = document.getElementById("transition");

chestWindow.addEventListener('click', () => {

    transition.style.visibility = "visible";
    transition.style.opacity = "1"

    setTimeout(() => {
        transition.style.opacity = '0';
        transition.style.visibility = 'hidden';
    }, 2000);

    setTimeout(() => {
        chest.classList.remove("standardChest");
        chest.classList.add("openChest");
    }, 900);
    
    setTimeout(() => {
        // Esconde a tela de boas-vindas
        chestWindow.style.display = 'none';
        // Mostra a tela de login
        rewardWindow.classList.remove('hide');
    },2000);
});    