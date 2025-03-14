<?php
// Inicia a sessão
session_start();

// Inclui o arquivo de configuração do banco de dados
include('../config/db.php');

// Define a URL base
$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/";

// Define o fuso horário
date_default_timezone_set('America/Sao_Paulo');

// Obtém o ID do usuário da sessão
$userId = $_SESSION['user_id'] ?? null;
if (!$userId) {
    header("Location: " . $BASE_URL . "PaginasPrincipais/fases-iniciais/index.php");
    exit();
}

/**
 * Função para resetar as vidas diárias do usuário.
 * Se o último reset não foi hoje, as vidas são resetadas para 2.
 */
function resetVidasDiarias($conn, $userId) {
    $hoje = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));

    // Busca o último reset e as vidas disponíveis do usuário
    $sql = "SELECT ultimo_reset, vidas_disponiveis FROM usuario WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);

    $ultimoReset = new DateTime($userData['ultimo_reset'], new DateTimeZone('America/Sao_Paulo'));
    $vidasDisponiveis = $userData['vidas_disponiveis'];

    // Se o último reset não foi hoje, reseta as vidas
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
$opcao = $_POST['opcao'] ?? null;

echo $opcao;

echo $opcao == 40;

// Verifica se a opção foi selecionada
if ($opcao !== null && $opcao !== "") {
    // Verifica se o jogador tem vidas suficientes para avançar
    if ($vidasDisponiveis <= 0) {
        $_SESSION['erro'] = "Você não tem vidas suficientes para avançar. Tente novamente amanhã!";
        header("Location: " . $BASE_URL . "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php");
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
            $sql = "UPDATE usuario SET vidas_disponiveis = vidas_disponiveis - 2 WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            break;
        case 3:
            $redirectUrl = "PaginasPrincipais/engenheiroArcano/fimDeJogo.php";
            $novaFase = 0;
            // Reduz uma vida ao ser redirecionado para fimDeJogo.php
            $sql = "UPDATE usuario SET vidas_disponiveis = vidas_disponiveis - 1 WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            break;
        case 4:
            $redirectUrl = "PaginasPrincipais/engenheiroArcano/fimDeJogo.php";
            $novaFase = 0;
            // Reduz uma vida ao ser redirecionado para fimDeJogo.php
            $sql = "UPDATE usuario SET vidas_disponiveis = vidas_disponiveis - 1 WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            break;
        case 5:
            $redirectUrl = "PaginasPrincipais/engenheiroArcano/fimDeJogo.php";
            // Reduzir uma vida ao ser redirecionado para fimDeJogo.php
            try {
                $sql = "UPDATE usuario SET vidas_disponiveis = vidas_disponiveis - 2 WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
                $stmt->execute();
            } catch (PDOException $e) {
                error_log("Erro ao reduzir vida: " . $e->getMessage());
            }

            // 40% de chance de setar o bau como verdadeiro
            if (rand(1, 100) <= 40) {
                try {
                    $avancaFase = true;
                    $novaFase = 8;
                    // Atualiza o campo bau para verdadeiro
                    $sqlBau = "UPDATE usuario SET bau = true WHERE id = :id";
                    $stmtBau = $conn->prepare($sqlBau);
                    $stmtBau->bindParam(':id', $userId, PDO::PARAM_INT);
                    $stmtBau->execute();
                    $userId = $_SESSION['user_id'] ?? null;
                    $sql = "UPDATE usuario SET vidas_disponiveis = 1 WHERE id = :id";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
                    $stmt->execute();

                    // Se o bau foi ativado, redireciona para a página de perder mas achou bau
                    $redirectUrl = "PaginasPrincipais/engenheiroArcano/missao8.php";
                } catch (PDOException $e) {
                    error_log("Erro ao ativar bau: " . $e->getMessage());
                }
            }
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
            $redirectUrl = "PaginasPrincipais/engenheiroArcano/fimDeJogo.php";
            $novaFase = 0;
            // Reduz uma vida ao ser redirecionado para fimDeJogo.php
            $sql = "UPDATE usuario SET vidas_disponiveis = vidas_disponiveis - 1 WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            break;
        case 9:
            $redirectUrl = "PaginasPrincipais/engenheiroArcano/fimDeJogo.php";
            $novaFase = 0;
            // Reduz uma vida ao ser redirecionado para fimDeJogo.php
            $sql = "UPDATE usuario SET vidas_disponiveis = vidas_disponiveis - 2 WHERE id = :id";
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
            $redirectUrl = "PaginasPrincipais/engenheiroArcano/fimDeJogo.php";
            $novaFase = 0;
            // Reduz uma vida ao ser redirecionado para fimDeJogo.php
            $sql = "UPDATE usuario SET vidas_disponiveis = vidas_disponiveis - 1 WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            break;
        case 12:
            $redirectUrl = "PaginasPrincipais/engenheiroArcano/fimDeJogo.php";
            $novaFase = 0;
            // Reduz uma vida ao ser redirecionado para fimDeJogo.php
            $sql = "UPDATE usuario SET vidas_disponiveis = vidas_disponiveis - 2 WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            break;
        case 13:
            $redirectUrl = "PaginasPrincipais/engenheiroArcano/fimDeJogo.php";
            $novaFase = 0;
            // Reduz uma vida ao ser redirecionado para fimDeJogo.php
            $sql = "UPDATE usuario SET vidas_disponiveis = vidas_disponiveis - 1 WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
            $stmt->execute();
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
            $sql = "UPDATE usuario SET vidas_disponiveis = vidas_disponiveis - 2 WHERE id = :id";
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
            $sql = "UPDATE usuario SET vidas_disponiveis = vidas_disponiveis - 2 WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            break;
        case 18:
            $redirectUrl = "PaginasPrincipais/engenheiroArcano/fimDeJogo.php";
            $novaFase = 0;
            // Reduz uma vida ao ser redirecionado para fimDeJogo.php
            $sql = "UPDATE usuario SET vidas_disponiveis = vidas_disponiveis - 1 WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            break;
        case 19:
            $redirectUrl = "PaginasPrincipais/engenheiroArcano/fimDeJogo.php";
            $novaFase = 0;
            // Reduz uma vida ao ser redirecionado para fimDeJogo.php
            $sql = "UPDATE usuario SET vidas_disponiveis = vidas_disponiveis - 1 WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            break;
        case 20:
            $redirectUrl = "PaginasPrincipais/engenheiroArcano/ganhador.php";
            break;
        case 21:
            $redirectUrl = "PaginasPrincipais/engenheiroArcano/fimDeJogo.php";
            $novaFase = 0;
            // Reduz uma vida ao ser redirecionado para fimDeJogo.php
            $sql = "UPDATE usuario SET vidas_disponiveis = vidas_disponiveis - 2 WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            break;
        case 22:
            $novaFase = 0;
            $redirectUrl = "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php";
            break;
        case 23:
            $avancaFase = true;
            $novaFase = 9;
            $redirectUrl = "PaginasPrincipais/engenheiroArcano/missao9.php";
            break;
        case 25:
            $novaFase = 0;
            $redirectUrl = "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php";
            break;
        case 26:
            $novaFase = 0;
            $redirectUrl = "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php";
            break;
        case 32:
            $novaFase = 0;
            $sql = "UPDATE usuario SET vidas_disponiveis = vidas_disponiveis - 1 WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            $redirectUrl = "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php";
            break;
        case 40:
            $novaFase = 10;
            $avancaFase = true;
            $redirectUrl = "PaginasPrincipais/engenheiroArcano/missao10.php";
            break;
        case 41:
            $novaFase = 11;
            $avancaFase = true;

                        
            $premioUser = $_SESSION['premioUser'];
            $idPremioNovo = $_SESSION['idPremio'];

                        
            // Aumenta a quantidade do prêmio que estava com o usuário.
            $stmt = $conn->prepare("UPDATE premio SET quantidade = quantidade + 1 WHERE id = :id");
            $stmt->execute([':id' => $premioUser]);

            // Diminui a quantidade do novo prêmio do usuário.
            $stmt = $conn->prepare("UPDATE premio SET quantidade = quantidade - 1 WHERE id = :id");
            $stmt->execute([':id' => $idPremioNovo]);

            // Muda o registro do prêmio atual do usuário.
            $stmt = $conn->prepare("UPDATE usuario SET idPremio = :idp WHERE id = :idc");
            $stmt->execute([':idp' => $idPremioNovo, ':idc' => $premioUser]);


            $redirectUrl = "PaginasPrincipais/engenheiroArcano/missao11.php";
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