<?php
session_start(); // Inicia a sessão

// Configurações do banco de dados
$host = 'localhost'; // Endereço do servidor MySQL
$dbname = 'life'; // Nome do banco de dados
$username = 'root'; // Nome de usuário do banco de dados
$password = '240905'; // Senha do banco de dados

// Conecta ao banco de dados
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}

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
    echo "Usuário ou senha incorretos. Tente novamente.";
}
?>