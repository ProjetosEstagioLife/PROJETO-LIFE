<?php
session_start();
include('../config/db.php');
$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/"; // Defina a BASE_URL

// Obtém a opção selecionada
$opcao = isset($_POST['opcao']) ? $_POST['opcao'] : null;

// Verifica se a opção foi selecionada
if (isset($opcao) && $opcao !== "") {
    $userId = $_SESSION['user_id']; // Supondo que você tenha o ID do usuário na sessão

    // Verifica se a opção selecionada avança para uma nova missão
    $avancaFase = false;
    $novaFase = 0;
    $redirectUrl = "";

    switch ($opcao) {
        case 1:
            $redirectUrl = "PaginasPrincipais/fases-iniciais/aLendaDeLife.php";
            break;
        case 2:
            $avancaFase = true;
            $novaFase = 2;
            $redirectUrl = "PaginasPrincipais/Explorador/Missao2.php";
            break;
        case 3:
            $redirectUrl = "PaginasPrincipais/Explorador/fimDeJogo.php";
            $novaFase = 0;
            break;
        case 4:
            $redirectUrl = "PaginasPrincipais/Explorador/fimDeJogo.php";
            $novaFase = 0;
            break;
        case 5:
            $redirectUrl = "PaginasPrincipais/fases-iniciais/aLendaDeLife.php";
            break;
        case 6:
            $avancaFase = true;
            $novaFase = 3;
            $redirectUrl = "PaginasPrincipais/Explorador/missao3.php";
            break;
        case 7:
            $redirectUrl = "PaginasPrincipais/fases-iniciais/aLendaDeLife.php";
            break;
        case 8:
            $avancaFase = true;
            $novaFase = 4;
            $redirectUrl = "PaginasPrincipais/Explorador/missao4.php";
            break;
        case 9:
            $redirectUrl = "PaginasPrincipais/Explorador/fimDeJogo.php";
            $novaFase = 0;
            break;
        case 10:
            $avancaFase = true;
            $novaFase = 5;
            $redirectUrl = "PaginasPrincipais/Explorador/missao5.php";
            break;
        case 11:
            $redirectUrl = "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php";
            break;
        case 12:
            $redirectUrl = "PaginasPrincipais/Explorador/fimDeJogo.php";
            $novaFase = 0;
            break;
        case 13:
            $redirectUrl = "PaginasPrincipais/Explorador/fimDeJogo.php";
            $novaFase = 0;
            break;
        case 14:
            $redirectUrl = "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php";
            break;
        case 15:
            $avancaFase = true;
            $novaFase = 6;
            $redirectUrl = "PaginasPrincipais/Explorador/missao6.php";
            break;
        case 16:
            $redirectUrl = "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php";
            break;
        case 17:
            $avancaFase = true;
            $novaFase = 7;
            $redirectUrl = "PaginasPrincipais/Explorador/missao7.php";
            break;
        case 18:
            $redirectUrl = "PaginasPrincipais/Explorador/fimDeJogo.php";
            $novaFase = 0;
            break;
        case 19:
            $redirectUrl = "PaginasPrincipais/Explorador/ganhador.php";
            break;
        case 20:
            $redirectUrl = "PaginasPrincipais/Explorador/fimDeJogo.php";
            $novaFase = 0;
            break;
        case 21:
            $redirectUrl = "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php";
            break;
        case 22:
            $redirectUrl = "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php";
            break;
        case 23:
            $redirectUrl = "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php";
            break;
        default:
            echo "Opção inválida!";
            exit();
    }

    if ($avancaFase || $novaFase === 0) {
        $sql = "UPDATE usuario SET faseatual = :faseatual WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':faseatual', $novaFase, PDO::PARAM_INT);
        $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
        $stmt->execute();
    }
    
    // Redireciona o jogador para a URL correta
    header("Location: " . $BASE_URL . $redirectUrl);
    exit();
}
?>

<script>
    history.pushState(null, document.title, location.href);
    window.addEventListener('popstate', function () {
        history.pushState(null, document.title, location.href);
    });
</script>