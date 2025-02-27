<?php
session_start(); // Inicia a sessão

include_once('../config/db.php'); // Certifique-se de que o caminho está correto para o arquivo db.php


// Recebe os dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha_atual'];
$novaSenha = $_POST['nova_senha'];
$novaSenhaConfirmar = $_POST['nova_senha_confirmar']; // Corrigido: $POST para $_POST

// Verifica se as novas senhas coincidem
if ($novaSenha !== $novaSenhaConfirmar) {
    $_SESSION['error_message'] = "As novas senhas não coincidem.";
    header("Location: ../PaginasPrincipais/fases-iniciais/index.php");
    exit();
}

// Prepara e executa a consulta para buscar o usuário
$stmt = $conn->prepare("SELECT * FROM usuario WHERE email = :email");
$stmt->execute(['email' => $email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC); // Adicionado: obtendo dados como um array associativo

if ($user && password_verify($senha, $user['senha'])) { // Verifica se a senha é igual à armazenada
    // Atualiza a senha
    $stmt = $conn->prepare("UPDATE usuario SET senha = :novaSenha WHERE email = :email");
    $stmt->execute(['novaSenha' => password_hash($novaSenha, PASSWORD_DEFAULT), 'email' => $email]);
    
    // Credenciais corretas, inicia a sessão e redireciona
    $_SESSION['user_id'] = $user['id']; // Armazena o ID do usuário na sessão
    header("Location: ../PaginasPrincipais/fases-iniciais/regulamentos.php");
    exit();
} else {
    // Credenciais incorretas
    $_SESSION['error_message'] = "Usuário ou senha incorretos. Tente novamente.";
    header("Location: ../PaginasPrincipais/fases-iniciais/index.php");
    exit();
}
?>
