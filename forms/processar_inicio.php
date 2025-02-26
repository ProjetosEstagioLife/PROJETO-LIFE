<?php
session_start();
$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/"; // Defina a BASE_URL
$host = "localhost";
$dbname = "life";
$username = "root";
$password = "240905";
// Obtém a opção selecionada
$opcao = isset($_POST['opcao']) ? $_POST['opcao'] : null;

// Verifica se a opção foi selecionada
if ($opcao) {
    switch ($opcao) {
        case 1:
            // Lógica para a Opção 1
            header("Location: " . $BASE_URL . "PaginasPrincipais/fases-iniciais/aLendaDeLife.php");
            break;
        case 2:
            // Lógica para a Opção 2
            header("Location: " . $BASE_URL . "PaginasPrincipais/fases-iniciais/aLendaDeLife.php");
            break;
        case 3:
            // Lógica para a Opção 3
            header("Location: " . $BASE_URL . "PaginasPrincipais/fases-iniciais/aLendaDeLife.php");
            break;
        case 4:
            // Lógica para a Opção 4
            header("Location: " . $BASE_URL . "PaginasPrincipais/fases-iniciais/aLendaDeLife.php");
            break;
        case 5:
            // Lógica para a Opção 5
            header("Location: " . $BASE_URL . "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php");
            break;
        case 6:
            try {
                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        


                // Exemplo de atualização (assumindo que você tenha o ID do usuário armazenado na sessão)
                   if (isset($_SESSION['user_id'])) {
                    $explorador = isset($_POST['explorador']) ? $_POST['explorador'] : 0;
                   $guardiao = isset($_POST['guardiao']) ? $_POST['guardiao'] : 0;

                  if ($explorador === 1 || $guardiao === 1) {
                  header("Location: " . $BASE_URL . "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php");
                  exit(); // É uma boa prática usar exit() após redirecionamentos
                       }
                    
                    $engenheiro = isset($_POST['engenheiro']) ? 1 : 1;
                    $userId = $_SESSION['user_id'];
                    $stmt = $conn->prepare("UPDATE usuario SET engenheiro = :engenheiro WHERE id = :id");
                    $stmt->execute(['engenheiro'=> $engenheiro, 'id' => $userId]);
                    header("Location: " . $BASE_URL . "PaginasPrincipais/engenheiroArcano/missao1.php");
                    break;
                    exit();
                }
            } catch (PDOException $e) {
                die("Erro ao conectar ao banco de dados: " . $e->getMessage());
            }
        case 7:
            // Lógica para a Opção 7
            header("Location: " . $BASE_URL . "PaginasPrincipais/Guardiao/missao1.php");
            break;
        case 8:
            // Lógica para a Opção 8
            header("Location: " . $BASE_URL . "PaginasPrincipais/Explorador/missao1.php");
            break;
        default:
            // Caso não corresponda a nenhuma opção
            header("Location: " . $BASE_URL . "PaginasPrincipais/fases-iniciais/cartaParaQuemAcabou.php");
            break;
    }
} else {
    // Redireciona para uma página de erro ou padrão se nenhuma opção for selecionada
    header("Location: " . $BASE_URL . "pagina_erro.php");
}

exit(); // Certifique-se de chamar exit após redirecionamentos
?>

<script>
    history.pushState(null, document.title, location.href);
    window.addEventListener('popstate', function (event) {
        history.pushState(null, document.title, location.href);
    });
</script>
