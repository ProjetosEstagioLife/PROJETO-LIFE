<?php
session_start();
include('../config/db.php');

$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/";

$userId = $_SESSION['user_id'] ?? null;
if (!$userId) {
    echo json_encode(['success' => false, 'message' => 'Usuário não autenticado.']);
    exit();
}

$data = json_decode(file_get_contents('php://input'), true);
$diceResult = $data['diceResult'] ?? null;

if ($diceResult === null) {
    echo json_encode(['success' => false, 'message' => 'Resultado do dado não recebido.']);
    exit();
}

// Lógica para decidir se o jogador avança de fase
$avancaFase = $diceResult > 3; // Exemplo: avança se o resultado for maior que 3
$novaFase = 0;
$redirectUrl = "";

if ($avancaFase) {
    // Lógica para avançar de fase
    $novaFase = $_SESSION['faseatual'] + 1;
    $redirectUrl = "PaginasPrincipais/engenheiroArcano/missao" . $novaFase . ".php";
} else {
    // Lógica para não avançar de fase
    $redirectUrl = "PaginasPrincipais/engenheiroArcano/fimDeJogo.php";
}

// Atualiza a fase atual no banco de dados
$sql = "UPDATE usuario SET faseatual = :faseatual WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':faseatual', $novaFase, PDO::PARAM_INT);
$stmt->bindValue(':id', $userId, PDO::PARAM_INT);
$stmt->execute();

echo json_encode(['success' => true, 'redirectUrl' => $BASE_URL . $redirectUrl]);
exit();
?>