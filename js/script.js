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