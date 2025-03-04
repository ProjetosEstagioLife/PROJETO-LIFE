<?php
// Inicia a sessão
session_start();

// Define a Base URL correta
$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/";

// Configura o fuso horário
date_default_timezone_set('America/Sao_Paulo');

// Verifica se o usuário está logado
$userId = $_SESSION['user_id'] ?? null;
if (!$userId) {
    // Redireciona para a página de login se o usuário não estiver logado
    header("Location: " . $BASE_URL . "PaginasPrincipais/fases-iniciais/index.php");
    exit();
}

// Inclui o arquivo de configuração do banco de dados
include_once(__DIR__ . '/../config/db.php');

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

// Busca os dados do usuário (fase atual e tipo de personagem)
$sql = "SELECT faseatual, engenheiro, guardiao, explorador FROM usuario WHERE id = :id";
$stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);

    $faseAtual = $userData['faseatual'];
    $engenheiro = $userData['engenheiro'];
    $guardiao = $userData['guardiao'];
    $explorador = $userData['explorador'];

    // Verifica se o jogador já avançou além desta fase
    if ($faseAtual > $missaoAtual) { // $missaoAtual deve ser definido na página que inclui o template
        if ($engenheiro == 1) {
            header("Location: " . $BASE_URL . "PaginasPrincipais/engenheiroArcano/missao" . $faseAtual . ".php");
        } elseif ($guardiao == 1) {
            header("Location: " . $BASE_URL . "PaginasPrincipais/Guardiao/missao" . $faseAtual . ".php");
        } elseif ($explorador == 1) {
            header("Location: " . $BASE_URL . "PaginasPrincipais/Explorador/missao" . $faseAtual . ".php");
        }
        exit();
    }

    // Verifica se o jogador está tentando acessar uma fase anterior
    if ($faseAtual < $missaoAtual) {
        if ($engenheiro == 1) {
            header("Location: " . $BASE_URL . "PaginasPrincipais/engenheiroArcano/missao" . $faseAtual . ".php");
        } elseif ($guardiao == 1) {
            header("Location: " . $BASE_URL . "PaginasPrincipais/Guardiao/missao" . $faseAtual . ".php");
        } elseif ($explorador == 1) {
            header("Location: " . $BASE_URL . "PaginasPrincipais/Explorador/missao" . $faseAtual . ".php");
        }
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>

    <!-- CSS -->
    <link rel="stylesheet" href="<?= $BASE_URL ?>css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header>
    <div class="container">
        <div class="row align-items-center">
           
            <div class="col text-end">
                <!-- Botão de deslogar -->
                <?php if ($userId): ?>
                    <a href="<?= $BASE_URL ?>forms/logout.php" class="btn btn-custom mt-4">Deslogar</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
</header>

<main>
    <div class="container">
        <?php
        // Exibe a mensagem de erro, se houver
        if (isset($_SESSION['erro'])) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            echo $_SESSION['erro'];
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
            unset($_SESSION['erro']); // Remove a mensagem após exibir
        }

        // Exibe a mensagem de sucesso, se houver
        if (isset($_SESSION['sucesso'])) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
            echo $_SESSION['sucesso'];
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
            unset($_SESSION['sucesso']); // Remove a mensagem após exibir
        }
        ?>

        <!-- Conteúdo principal da página -->
        <?php echo $content; ?>
    </div>
</main>
<?php if ($userId): ?>
    <div class="vidas-disponiveis d-flex justify-content-center align-items-end mt-4">
    <button class="btn btn-custom">Vidas: <?= $vidasDisponiveis ?></button>
    </div>
<?php endif; ?>
<footer>
    <div class="container text-center">
        <p>&copy; <?= date('Y'); ?> PROJETO LIFE. Todos os direitos reservados.</p>
    </div>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= $BASE_URL ?>js/script.js"></script>

</body>
</html>