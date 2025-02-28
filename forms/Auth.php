<?php
session_start();

include_once('../config/db.php'); 
$email = $_POST['email'];
$senha = $_POST['senha'];

$stmt = $conn->prepare("SELECT * FROM usuario WHERE email = :email");
$stmt->execute(['email' => $email]);

$user = $stmt->fetch();

if ($user && $senha === $user['senha']) {
    $_SESSION['user_id'] = $user['id']; 
    header("Location: ../PaginasPrincipais/fases-iniciais/regulamentos.php");
    exit();
} else {
    $_SESSION['error_message'] = "Usuário ou senha incorretos. Tente novamente.";
    header("Location: ../PaginasPrincipais/fases-iniciais/index.php");
    exit(); 
}
?>
