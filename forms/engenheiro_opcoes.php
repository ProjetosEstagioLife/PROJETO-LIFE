<?php
session_start();
include('../config/db.php');
$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/"; // Defina a BASE_URL

// Obtém a opção selecionada
$opcao = isset($_POST['opcao']) ? $_POST['opcao'] : null;

// Verifica se a opção foi selecionada
if (isset($opcao) && $opcao !== "") {
    switch ($opcao) {
        case 1:
            header("Location: " . $BASE_URL . "PaginasPrincipais/engenheiroArcano/missao2.php");
            exit();
        case 2:
            header("Location: " . $BASE_URL . "PaginasPrincipais/engenheiroArcano/fimDeJogo.php");
            exit();
        case 3:
            header("Location: " . $BASE_URL . "PaginasPrincipais/fases-iniciais/aLendaDeLife.php");
            exit();
        case 4:
            header("Location: " . $BASE_URL . "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php");
            exit();
        case 5:
            header("Location: " . $BASE_URL . "PaginasPrincipais/engenheiroArcano/fimDeJogo.php");
            exit();
        case 6:
            header("Location: " . $BASE_URL . "PaginasPrincipais/engenheiroArcano/missao3.php");
            exit();
        case 7:
            header("Location: " . $BASE_URL . "PaginasPrincipais/engenheiroArcano/missao4.php");
            exit();
        case 8:
            header("Location: " . $BASE_URL . "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php");
            exit();
        case 9:
            header("Location: " . $BASE_URL . "PaginasPrincipais/engenheiroArcano/fimDeJogo.php");
            exit();
        case 10:
            header("Location: " . $BASE_URL . "PaginasPrincipais/engenheiroArcano/missao5.php");
            exit();
        case 11:
            header("Location: " . $BASE_URL . "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php");
            exit();
        case 12:
            header("Location: " . $BASE_URL . "PaginasPrincipais/engenheiroArcano/fimDeJogo.php");
            exit();
        case 13:
            header("Location: " . $BASE_URL . "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php");
            exit();
        case 14:
            header("Location: " . $BASE_URL . "PaginasPrincipais/engenheiroArcano/missao6.php");
            exit();
        case 15:
            header("Location: " . $BASE_URL . "PaginasPrincipais/engenheiroArcano/fimDeJogo.php");
            exit();
        case 16:
            header("Location: " . $BASE_URL . "PaginasPrincipais/engenheiroArcano/missao7.php");
            exit();
        case 17:
            header("Location: " . $BASE_URL . "PaginasPrincipais/engenheiroArcano/fimDeJogo.php");
            exit();
        case 18:
            header("Location: " . $BASE_URL . "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php");
            exit();
        case 19:
            header("Location: " . $BASE_URL . "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php");
            exit();
        case 20:
            header("Location: " . $BASE_URL . "PaginasPrincipais/engenheiroArcano/ganhador.php");
            exit();
        case 21:
            header("Location: " . $BASE_URL . "PaginasPrincipais/engenheiroArcano/fimDeJogo.php");
            exit();
        case 22:
            header("Location: " . $BASE_URL . "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php");
            exit();
        default:
            echo "Opção inválida!";
            exit();
    }
}
?>

<script>
    history.pushState(null, document.title, location.href);
    window.addEventListener('popstate', function () {
        history.pushState(null, document.title, location.href);
    });
</script>
