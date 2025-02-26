<?php
$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/"; // Defina a BASE_URL

// Obtém a opção selecionada
$opcao = isset($_POST['opcao']) ? $_POST['opcao'] : null;

// Verifica se a opção foi selecionada
if ($opcao) {
    switch ($opcao) {
        case 1:
            // Lógica para a Opção 1
            // Exemplo: redirecionar para uma página específica
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
                // Lógica para a Opção 4
                header("Location: " . $BASE_URL . "PaginasPrincipais/fases-iniciais/escolhaPersonagem.php");
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
