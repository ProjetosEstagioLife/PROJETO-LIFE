<?php
session_start();

include_once('../config/db.php'); 
$email = $_POST['email'];
$senha = $_POST['senha'];
$senha_hash = hash('sha256', $senha);

$stmt = $conn->prepare("SELECT * FROM usuario WHERE email = :email");
$stmt->execute(['email' => $email]);

$user = $stmt->fetch();

if ($user && $senha_hash === $user['senha']) {
    $_SESSION['user_id'] = $user['id']; 
    $user_role = $user['adm'];
    $_SESSION['user_Role'] = $user_role;

    if ($user_role == 0) {
        header("Location: ../PaginasPrincipais/fases-iniciais/regulamentos.php");
    } else {
        header("Location: ../PaginasPrincipais/fases-iniciais/admPage.php");
    }

    exit();
} else {
    $_SESSION['error_message'] = "Usuário ou senha incorretos. Tente novamente.";
    header("Location: ../PaginasPrincipais/fases-iniciais/index.php");
    exit(); 
}
?>
