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
                    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                    if (isset($_SESSION['user_id'])) {
                        $explorador = isset($_POST['explorador']) ? $_POST['explorador'] : 0;
                        $guardiao = isset($_POST['guardiao']) ? $_POST['guardiao'] : 0;
    
                        if ($explorador === 1 || $guardiao === 1) {
                            header("Location: " . $BASE_URL . "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php");
                            exit();
                        }
    
                        $engenheiro = 1; // Define como 1 quando clicado
                        $userId = $_SESSION['user_id'];
                        $stmt = $conn->prepare("UPDATE usuario SET engenheiro = :engenheiro WHERE id = :id");
                        $stmt->execute(['engenheiro' => $engenheiro, 'id' => $userId]);
                        header("Location: " . $BASE_URL . "PaginasPrincipais/engenheiroArcano/missao1.php");
                        exit();
                    }
                } catch (PDOException $e) {
                    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
                }
                break;
            case 7:
                try {
                    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                    if (isset($_SESSION['user_id'])) {
                        $explorador = isset($_POST['explorador']) ? $_POST['explorador'] : 0;
                        $engenheiro = isset($_POST['engenheiro']) ? $_POST['engenheiro'] : 0;
    
                        if ($explorador === 1 || $engenheiro === 1) {
                            header("Location: " . $BASE_URL . "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php");
                            exit();
                        }
    
                        $guardiao = 1; // Define como 1 quando clicado
                        $userId = $_SESSION['user_id'];
                        $stmt = $conn->prepare("UPDATE usuario SET guardiao = :guardiao WHERE id = :id");
                        $stmt->execute(['guardiao' => $guardiao, 'id' => $userId]);
                        header("Location: " . $BASE_URL . "PaginasPrincipais/Guardiao/missao1.php");
                        exit();
                    }
                } catch (PDOException $e) {
                    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
                }
                break;
            case 8:
                try {
                    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                    if (isset($_SESSION['user_id'])) {
                        var_dump($_POST); // Verifique se os valores estão chegando
                        $guardiao = isset($_POST['guardiao']) ? (int)$_POST['guardiao'] : 0;
                        $engenheiro = isset($_POST['engenheiro']) ? (int)$_POST['engenheiro'] : 0;
                
                        if ($guardiao === 1 || $engenheiro === 1) {
                            header("Location: " . $BASE_URL . "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php");
                            exit();
                        }
                
                        $explorador = 1;
                        $userId = $_SESSION['user_id'];
                        $stmt = $conn->prepare("UPDATE usuario SET explorador = :explorador WHERE id = :id");
                        $stmt->execute(['explorador' => $explorador, 'id' => $userId]);
                
                        header("Location: " . $BASE_URL . "PaginasPrincipais/Explorador/missao1.php");
                        exit();
                    }
                } catch (PDOException $e) {
                    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
                }
                
                header("Location: " . $BASE_URL . "pagina_erro.php");
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

<script>
    history.pushState(null, document.title, location.href);
    window.addEventListener('popstate', function (event) {
        history.pushState(null, document.title, location.href);
    });
</script>
