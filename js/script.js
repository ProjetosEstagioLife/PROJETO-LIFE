// Selecionando os elementos
const welcomeWindow = document.getElementById('welcomeWindow');
const loginWindow = document.getElementById('loginWindow');

// Adicionando o evento de clique no welcomeWindow
welcomeWindow.addEventListener('click', () => {
    // Esconde a tela de boas-vindas
    welcomeWindow.style.display = 'none';
    // Mostra a tela de login
    loginWindow.classList.remove('hidden');
});

// Impede a navegação para a página anterior
window.history.pushState(null, "", window.location.href);

window.history.forward(); // Avança para a próxima página, se possível
window.history.pushState(null, null, window.location.href);
window.onpopstate = function () {
    window.history.forward(); // Impede que o usuário use o "voltar"
};