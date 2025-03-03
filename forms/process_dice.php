<?php
session_start();
include('../config/db.php');
$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/"; // Defina a BASE_URL

// Obtém o ID do usuário da sessão
$userId = $_SESSION['user_id'] ?? null;
if (!$userId) {
    echo json_encode(['error' => 'Usuário não autenticado']);
    exit();
}

// Recebe os dados do AJAX
$data = json_decode(file_get_contents('php://input'), true);
$diceResult = $data['diceResult'] ?? null;
$isSecondRoll = $data['isSecondRoll'] ?? false;
$successRedirectUrl = $data['successRedirectUrl'] ?? null;

if (!$diceResult || !$successRedirectUrl) {
    echo json_encode(['error' => 'Dados inválidos']);
    exit();
}

// Define a URL de redirecionamento com base no resultado do dado
if ($diceResult >= 1) {
    // Sucesso: Redireciona para a missão
    $redirectUrl = $BASE_URL . $successRedirectUrl;
} else {
    // Falha: Redireciona para fimDeJogo.php e reduz uma vida
    $sql = "UPDATE usuario SET vidas_disponiveis = vidas_disponiveis - 1 WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
    $stmt->execute();

    $redirectUrl = $BASE_URL . "PaginasPrincipais/engenheiroArcano/fimDeJogo.php";
}

// Retorna a URL de redirecionamento para o JavaScript
echo json_encode(['redirect' => $redirectUrl]);
exit();
?>