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
      <form action="../../forms/Auth.php" method="post">
    <label for="username">Usuário (E-mail):</label>
    <input type="text" id="username" name="email" placeholder="Ex: usuario@2025" required>

    <label for="password">Senha:</label>
    <input type="password" id="password" name="senha" placeholder="Ex: suasenha1234" required>

    <button type="button" id="forgotPassword">Esqueceu sua senha?</button>
    <input type="submit" id="loginSubmit" value="Entrar">
</form>
    </div>
';

include_once(('../../templates/layoutLogin.php'));
?>