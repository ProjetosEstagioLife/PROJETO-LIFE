<?php
session_start(); // Inicia a sessão, se necessário
$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/"; // Defina a BASE_URL
include_once('../config/db.php'); // Certifique-se de que o caminho está correto para o arquivo db.php

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se o checkbox foi marcado
    $concordaComTermos = isset($_POST['acceptTerms']) ? 1 : 0;

    // Verifica se o ID do usuário está na sessão
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];

        try {
            // Atualiza a tabela usuario com o valor do checkbox
            $stmt = $conn->prepare("UPDATE usuario SET ConcordaComTermos = :concorda WHERE id = :id");
            $stmt->execute(['concorda' => $concordaComTermos, 'id' => $userId]);

            // Redireciona após a atualização
            header("Location: ../PaginasPrincipais/fases-iniciais/inicio.php");
            exit();
        } catch (PDOException $e) {
            die("Erro ao atualizar os dados: " . $e->getMessage());
        }
    } else {
        // Caso o usuário não tenha sessão ativa
        echo "Usuário não autenticado.";
    }
} else {
    // Se o acesso não for via POST, redirecione ou exiba uma mensagem de erro
    echo "Método de requisição inválido.";
}
?>
