<?php
session_start();
include('../config/db.php');
$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/"; // Defina a BASE_URL

// Define o fuso horário
date_default_timezone_set('America/Sao_Paulo');

// Obtém o ID do usuário da sessão
$userId = $_SESSION['user_id'] ?? null;
if (!$userId) {
    header("Location: " . $BASE_URL . "PaginasPrincipais/fases-iniciais/index.php");
    exit();
}

// Função para resetar as vidas diárias
function resetVidasDiarias($conn, $userId) {
    $hoje = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
    $sql = "SELECT ultimo_reset, vidas_disponiveis FROM usuario WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);

    $ultimoReset = new DateTime($userData['ultimo_reset'], new DateTimeZone('America/Sao_Paulo'));
    $vidasDisponiveis = $userData['vidas_disponiveis'];

    // Se o último reset não for hoje, resetar as vidas
    if ($hoje->format('Y-m-d') > $ultimoReset->format('Y-m-d')) {
        $sqlUpdate = "UPDATE usuario SET vidas_disponiveis = 2, ultimo_reset = :hoje WHERE id = :id";
        $stmtUpdate = $conn->prepare($sqlUpdate);
        $stmtUpdate->bindValue(':hoje', $hoje->format('Y-m-d'), PDO::PARAM_STR);
        $stmtUpdate->bindValue(':id', $userId, PDO::PARAM_INT);
        $stmtUpdate->execute();
        return 2; // Retorna o valor resetado
    }

    return $vidasDisponiveis; // Retorna o valor atual
}

// Verifica e reseta as vidas diárias
$vidasDisponiveis = resetVidasDiarias($conn, $userId);

// Obtém a opção selecionada
$opcao = isset($_POST['opcao']) ? $_POST['opcao'] : null;

// Verifica se a opção foi selecionada
if (isset($opcao) && $opcao !== "") {
    // Verifica se o jogador tem vidas suficientes para avançar
    if ($vidasDisponiveis <= 0) {
        $_SESSION['erro'] = "Você não tem vidas suficientes para avançar. Tente novamente amanhã!";
        header("Location: " . $BASE_URL . "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php"); // Redireciona para a página de escolha de personagem
        exit();
    }

    // Lógica para avançar de fase
    $avancaFase = false;
    $novaFase = 0;
    $redirectUrl = "";

    switch ($opcao) {
        case 1:
            $avancaFase = true;
            $novaFase = 2;
            $redirectUrl = "PaginasPrincipais/engenheiroArcano/missao2.php";
            break;
        case 2:
            $redirectUrl = "PaginasPrincipais/engenheiroArcano/fimDeJogo.php";
            $novaFase = 0;
            // Reduz uma vida ao ser redirecionado para fimDeJogo.php
            $sql = "UPDATE usuario SET vidas_disponiveis = vidas_disponiveis - 1 WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            break;
            case 3:
                $missaoAtual = 2;
                $_SESSION['missaoAtual'] = $missaoAtual; // Armazena na sessão
                $redirectUrl = "dice.php?successRedirect=PaginasPrincipais/engenheiroArcano/missao" . $missaoAtual . ".php&failRedirect=PaginasPrincipais/engenheiroArcano/fimDeJogo.php";
                break;
        case 4:
            $redirectUrl = "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php";
            break;
        case 5:
            $redirectUrl = "PaginasPrincipais/engenheiroArcano/fimDeJogo.php";
            $novaFase = 0;
            // Reduz uma vida ao ser redirecionado para fimDeJogo.php
            $sql = "UPDATE usuario SET vidas_disponiveis = vidas_disponiveis - 1 WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            break;
        case 6:
            $avancaFase = true;
            $novaFase = 3;
            $redirectUrl = "PaginasPrincipais/engenheiroArcano/missao3.php";
            break;
        case 7:
            $avancaFase = true;
            $novaFase = 4;
            $redirectUrl = "PaginasPrincipais/engenheiroArcano/missao4.php";
            break;
        case 8:
            $redirectUrl = "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php";
            break;
        case 9:
            $redirectUrl = "PaginasPrincipais/engenheiroArcano/fimDeJogo.php";
            $novaFase = 0;
            // Reduz uma vida ao ser redirecionado para fimDeJogo.php
            $sql = "UPDATE usuario SET vidas_disponiveis = vidas_disponiveis - 1 WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            break;
        case 10:
            $avancaFase = true;
            $novaFase = 5;
            $redirectUrl = "PaginasPrincipais/engenheiroArcano/missao5.php";
            break;
        case 11:
            $redirectUrl = "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php";
            break;
        case 12:
            $redirectUrl = "PaginasPrincipais/engenheiroArcano/fimDeJogo.php";
            $novaFase = 0;
            // Reduz uma vida ao ser redirecionado para fimDeJogo.php
            $sql = "UPDATE usuario SET vidas_disponiveis = vidas_disponiveis - 1 WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            break;
        case 13:
            $redirectUrl = "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php";
            break;
        case 14:
            $avancaFase = true;
            $novaFase = 6;
            $redirectUrl = "PaginasPrincipais/engenheiroArcano/missao6.php";
            break;
        case 15:
            $redirectUrl = "PaginasPrincipais/engenheiroArcano/fimDeJogo.php";
            $novaFase = 0;
            // Reduz uma vida ao ser redirecionado para fimDeJogo.php
            $sql = "UPDATE usuario SET vidas_disponiveis = vidas_disponiveis - 1 WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            break;
        case 16:
            $avancaFase = true;
            $novaFase = 7;
            $redirectUrl = "PaginasPrincipais/engenheiroArcano/missao7.php";
            break;
        case 17:
            $redirectUrl = "PaginasPrincipais/engenheiroArcano/fimDeJogo.php";
            $novaFase = 0;
            // Reduz uma vida ao ser redirecionado para fimDeJogo.php
            $sql = "UPDATE usuario SET vidas_disponiveis = vidas_disponiveis - 1 WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            break;
        case 18:
            $redirectUrl = "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php";
            break;
        case 19:
            $redirectUrl = "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php";
            break;
        case 20:
            $redirectUrl = "PaginasPrincipais/engenheiroArcano/ganhador.php";
            break;
        case 21:
            $redirectUrl = "PaginasPrincipais/engenheiroArcano/fimDeJogo.php";
            $novaFase = 0;
            // Reduz uma vida ao ser redirecionado para fimDeJogo.php
            $sql = "UPDATE usuario SET vidas_disponiveis = vidas_disponiveis - 1 WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            break;
        case 22:
            $redirectUrl = "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php";
            break;
        case 25:
            $novaFase = 0;
            $redirectUrl = "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php";
            break;
        default:
            echo "Opção inválida!";
            exit();
    }

    // Atualiza a fase atual no banco de dados se necessário
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