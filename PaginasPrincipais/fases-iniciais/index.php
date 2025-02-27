<?php
include_once('../../config/db.php'); // Certifique-se de que o caminho está correto para o arquivo db.php

// Verifica se há uma mensagem de erro
$error_message = '';
if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    unset($_SESSION['error_message']); // Remove a mensagem após exibi-la
}

$title = "Tela de Login";
$content = '
    <div id="welcomeWindow">
        <div id="logoContainer"><img src="../../Midias/Logo black.png" alt="Logo Life"><p>apresenta:</p></div>
        <h1>O Alvorecer de Novas Conexões</h1>
        <span>Clique em qualquer lugar para iniciar</span>
    </div>
    
    <div id="loginWindow" class="hidden">
        <h2>Entrar</h2>
        <div id="underline"></div>
        <form action="../../forms/Auth.php" method="post">
            <label for="username">Usuário (E-mail):</label>
            <input type="text" id="username" name="email" placeholder="Ex: usuario@2025" required>

            <label for="password">Senha:</label>
            <input type="password" id="password" name="senha" placeholder="Ex: suasenha1234" required>

            <input type="submit" id="loginSubmit" value="Entrar">
        </form>
        ' . ($error_message ? '<p class="error-message">' . htmlspecialchars($error_message) . '</p>' : '') . '
    </div>
';

include_once(('../../templates/layoutLogin.php'));
?>
