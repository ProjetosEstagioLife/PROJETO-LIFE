<?php
session_start();
include('../config/db.php');
$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/"; // Defina a BASE_URL

// Obtém a opção selecionada
$opcao = isset($_POST['opcao']) ? $_POST['opcao'] : null;

// Verifica se a opção foi selecionada
if ($opcao) {
    switch ($opcao) {
        case 1:
            // Lógica para a Opção 1
            header("Location: " . $BASE_URL . "PaginasPrincipais/fases-iniciais/aLendaDeLife.php");
            exit(); // Adicionado exit após redirecionamento
        case 2:
            // Lógica para a Opção 2
            header("Location: " . $BASE_URL . "PaginasPrincipais/fases-iniciais/aLendaDeLife.php");
            exit(); // Adicionado exit após redirecionamento
        case 3:
            // Lógica para a Opção 3
            header("Location: " . $BASE_URL . "PaginasPrincipais/fases-iniciais/aLendaDeLife.php");
            exit(); // Adicionado exit após redirecionamento
        case 4:
            // Lógica para a Opção 4
            header("Location: " . $BASE_URL . "PaginasPrincipais/fases-iniciais/aLendaDeLife.php");
            exit(); // Adicionado exit após redirecionamento
        case 5:
            // Lógica para a Opção 5
            header("Location: " . $BASE_URL . "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php");
            exit(); // Adicionado exit após redirecionamento
        case 6:
            try {
                if (isset($_SESSION['user_id'])) {
                    $userId = $_SESSION['user_id'];

                    // Define engenheiro = 1, os outros dois = 0 e faseatual = 1
                    $stmt = $conn->prepare("UPDATE usuario SET engenheiro = 1, guardiao = 0, explorador = 0, faseatual = 1 WHERE id = :id");
                    $stmt->execute(['id' => $userId]);

                    // Redireciona para a missão 1 do engenheiro
                    header("Location: " . $BASE_URL . "PaginasPrincipais/engenheiroArcano/missao1.php");
                    exit();
                }
            } catch (PDOException $e) {
                die("Erro ao conectar ao banco de dados: " . $e->getMessage());
            }
            break;
        case 7:
            try {
                if (isset($_SESSION['user_id'])) {
                    $userId = $_SESSION['user_id'];

                    // Define guardiao = 1, os outros dois = 0 e faseatual = 1
                    $stmt = $conn->prepare("UPDATE usuario SET guardiao = 1, engenheiro = 0, explorador = 0, faseatual = 1 WHERE id = :id");
                    $stmt->execute(['id' => $userId]);

                    // Redireciona para a missão 1 do guardião
                    header("Location: " . $BASE_URL . "PaginasPrincipais/Guardiao/missao1.php");
                    exit();
                }
            } catch (PDOException $e) {
                die("Erro ao conectar ao banco de dados: " . $e->getMessage());
            }
            break;
        case 8:
            try {
                if (isset($_SESSION['user_id'])) {
                    $userId = $_SESSION['user_id'];

                    // Define explorador = 1, os outros dois = 0 e faseatual = 1
                    $stmt = $conn->prepare("UPDATE usuario SET explorador = 1, engenheiro = 0, guardiao = 0, faseatual = 1 WHERE id = :id");
                    $stmt->execute(['id' => $userId]);

                    // Redireciona para a missão 1 do explorador
                    header("Location: " . $BASE_URL . "PaginasPrincipais/Explorador/missao1.php");
                    exit();
                }
            } catch (PDOException $e) {
                die("Erro ao conectar ao banco de dados: " . $e->getMessage());
            }
            break;
        default:
            echo "Opção inválida!";
            exit();
    }
}
?>

<script>
    history.pushState(null, document.title, location.href);
    window.addEventListener('popstate', function (event) {
        history.pushState(null, document.title, location.href);
    });
</script>