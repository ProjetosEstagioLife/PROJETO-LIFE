<?php
$host = "localhost";
$dbname = "life";
$username = "root";
$password = "240905";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Defina a variável $conn
    $conn = $pdo; 
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>