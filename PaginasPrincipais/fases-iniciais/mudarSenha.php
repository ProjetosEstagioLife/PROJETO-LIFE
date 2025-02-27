<?php
$title = "Mudar Senha";
$content = '
    <div id="loginWindow">
        <h2>Mudar Senha</h2>
        <div id="underline"></div>';

        // Exibir mensagem de erro, se existir
        if (isset($_SESSION['error_message'])) {
            $content .= '<div class="error-message" style="color:red;">' . $_SESSION['error_message'] . '</div>';
            unset($_SESSION['error_message']); // Limpa a mensagem após exibi-la
        }

$content .= '
        <form action="../../forms/mudarSenha.php" method="post">
            <label for="username">Usuário (E-mail):</label>
            <input type="text" id="username" name="email" placeholder="Ex: Confirme seu E-mail" required>

            <label for="current_password">Senha Atual:</label>
            <input type="password" id="current_password" name="senha_atual" placeholder="Digite sua senha atual" required>

            <label for="confirm_current_password">Preencha a nova senha:</label>
            <input type="password" id="confirm_current_password" name="nova_senha" placeholder="Confirme sua nova senha" required>

            <label for="new_password">Confirme a nova Senha</label>
            <input type="password" id="new_password" name="nova_senha_confirmar" placeholder="Digite sua nova senha" required>

            <button type="submit" class="btn btn-custom">Alterar Senha</button>
        </form>

        <a href="index.php" class="btn btn-dark btn-sm mt-3">Voltar</a>
    </div>

    <style>
        .btn-custom {
            background-color: #EC7A23;
            color: white;
            border: none;
        }

        .btn-custom:hover {
            background-color: #d0691f;
        }

        .error-message {
            margin-bottom: 10px;
            font-weight: bold;
        }
    </style>
';

include_once('../../templates/layoutLogin.php');
?>
