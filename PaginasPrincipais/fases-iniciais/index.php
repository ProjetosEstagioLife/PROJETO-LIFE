<?php

$title = "Tela de Login";
$content = '
    <div id="welcomeWindow">
            <div id="logoContainer"><img src="Midias/Logo black.png" alt="Logo da empresa"><p>apresenta:</p></div>
            <h1>O Alvorecer de Novas Conexões</h1>
            <span>Clique em qualquer lugar para iniciar</span>
    </div>
    
    <div id="loginWindow" class="hidden">
        <h2>Entrar</h2>
        <div id="underline"></div>
        <form action="/login.php">
            <label for="username" id="username" name="username">Usuário:</label>
            <input type="text" placeholder="Ex: usuario@2025" required>
            <label for="password" id="password" name="password">Senha:</label>
            <input type="password" placeholder="Ex: suasenha1234" required>
            <button id="forgotPassword">Esqueceu sua senha?</button>
            <input type="submit" id="loginSubmit" value="Entrar">
        </form>
    </div>
';

include_once(('../../templates/layout.php'));
?>