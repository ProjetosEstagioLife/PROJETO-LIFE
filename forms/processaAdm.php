<?php
    session_start();
    include('../config/db.php');
    $BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/";

    $option = $_POST['opt'];

    if ($option == 1) {
        $nomePremio = isset($_POST['nome']) ? $_POST['nome'] : null;

        if ($nomePremio != null) {
            $quantidadePremio = $_POST['quantidade'];

            $stmt = $conn->prepare('INSERT INTO premio(nome, quantidade) VALUES ( :nome , :qtd )');
            $stmt->execute([':nome' => $nomePremio , ':qtd' => $quantidadePremio]);
        }
    } elseif ($option == 2) {
        $premioId = $_POST['premioSelected'];

        $stmt = $conn->prepare('UPDATE premio SET nome = :nome, quantidade = :qtd WHERE id = :id');
        $stmt->execute([':nome' => $_POST['nome'], ':qtd' => $_POST['quantidade'], ':id' => $premioId]);
    } elseif ($option == 3) {
        $premioId = $_POST['premioSelected'];

        $stmt = $conn->prepare('DELETE FROM premio WHERE id = :id');
        $stmt->execute([':id' => $premioId]);
    }

    header('Location: ' . $BASE_URL . 'PaginasPrincipais/fases-iniciais/admPage.php') 
?>