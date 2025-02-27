<?php
session_start(); // Inicia a sessão

// Inclui o arquivo de configuração com as variáveis de banco de dados
include_once('../config/db.php'); // Certifique-se de que o caminho está correto para o arquivo db.php

// Recebe os dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// Prepara e executa a consulta
$stmt = $conn->prepare("SELECT * FROM usuario WHERE email = :email");
$stmt->execute(['email' => $email]);

$user = $stmt->fetch();

if ($user && $senha === $user['senha']) { // Verifica se a senha é igual à armazenada
    // Credenciais corretas, inicia a sessão e redireciona
    $_SESSION['user_id'] = $user['id']; // Armazena o ID do usuário na sessão
    header("Location: ../PaginasPrincipais/fases-iniciais/regulamentos.php");
    exit();
} else {
    // Credenciais incorretas
    $_SESSION['error_message'] = "Usuário ou senha incorretos. Tente novamente.";
    header("Location: ../PaginasPrincipais/fases-iniciais/index.php");
    exit(); // Garante que o código não continue após o redirecionamento
}
?>
