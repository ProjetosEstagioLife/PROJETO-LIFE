<?php
$faseAtual = $_GET['faseatual'] ?? null;
if ($faseAtual) {
    echo "Fase atual recebida: " . $faseAtual; // Log para depuração
} else {
    echo "Fase atual não recebida."; // Log para depuração
}
// Define a Base URL correta
$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/";

// Captura a URL de sucesso
$successRedirectUrl = $_GET['successRedirect'] ?? 'PaginasPrincipais/engenheiroArcano/missao2.php'; // Valor padrão

// Define o título da página
$title = "Rolar Dado";

// Define o conteúdo específico da página
$content = '
    <div id="mainContainer">
        <div id="diceContainer">
            <div id="dice">
                <div class="face front"></div>
                <div class="face back"></div>
                <div class="face top"></div>
                <div class="face bottom"></div>
                <div class="face right"></div>
                <div class="face left"></div>
            </div>
            <button id="btnRoll">Rolar Dado</button>
        </div>
        <span id="result">Role o dado e tire sua sorte.</span>
    </div>

    <!-- Campo oculto para passar a URL de sucesso para o JavaScript -->
<input type="hidden" id="missaoAtual" value="<?php echo $missaoAtual; ?>">

    <input type="hidden" id="successRedirectUrl" value="' . $successRedirectUrl . '">
';

// Inclui o template principal
include(__DIR__ . '/templates/diceTemplate.php');
?>