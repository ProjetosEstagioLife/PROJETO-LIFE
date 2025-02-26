<?php
session_start(); // Inicia a sessão, se necessário
$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/"; // Defina a BASE_URL

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se o checkbox foi marcado
    $concordaComTermos = isset($_POST['acceptTerms']) ? 1 : 0;

    // Aqui você pode armazenar o valor no banco de dados, se necessário
    // Exemplo: Atualizar a tabela `usuario` com o valor do checkbox
    // Supondo que você tenha a conexão com o banco de dados já estabelecida

    // Configurações do banco de dados (ajuste conforme necessário)
    $host = 'localhost';
    $dbname = 'life';
    $username = 'root';
    $password = '240905';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Exemplo de atualização (assumindo que você tenha o ID do usuário armazenado na sessão)
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            $stmt = $conn->prepare("UPDATE usuario SET ConcordaComTermos = :concorda WHERE id = :id");
            $stmt->execute(['concorda' => $concordaComTermos, 'id' => $userId]);

            // Redirecionar ou exibir uma mensagem de sucesso
            header("Location: ../PaginasPrincipais/fases-iniciais/inicio.php");
            exit();
        }
    } catch (PDOException $e) {
        die("Erro ao conectar ao banco de dados: " . $e->getMessage());
    }

    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
        $stmt = $conn->prepare("UPDATE usuario SET ConcordaComTermos = :concorda WHERE id = :id");
        $stmt->execute([1 => $concordaComTermos, 'id' => $userId]);
    
        // Redirecionar ou exibir uma mensagem de sucesso
        header("Location: ../PaginasPrincipais/fases-iniciais/inicio.php");
        exit();
    }

} else {
    // Se o acesso não for via POST, redirecione ou exiba uma mensagem de erro
    echo "Método de requisição inválido.";
}
?>