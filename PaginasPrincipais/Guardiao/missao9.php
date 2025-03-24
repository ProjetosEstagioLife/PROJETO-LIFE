<?php
session_start();

$missaoAtual = 9; // Define a missão atual
$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/"; // Define a URL base
include_once('../../config/db.php');

// Configura o fuso horário
date_default_timezone_set('America/Sao_Paulo');

// Define o título da página
$title = "Baú Misterioso";

$stmt = $conn->prepare("SELECT * FROM premio ORDER BY id");
$stmt->execute();
$premiosDisponiveis = array();

while ($linha = $stmt->fetch()) {
    $nome = $linha["nome"];
    $premios[] = $linha["nome"]; //array de premios para puxar pelo id
    $qtd = $linha["quantidade"];
    for ($j = 0; $j < intval($qtd); $j++) {
        $premiosDisponiveis[] = $nome;
    }
}

$userId = $_SESSION['user_id'];

// Busca id do premio que o usuário já possui, se possuir
$stmt = $conn->prepare("SELECT idPremio FROM usuario WHERE id = :id");
$stmt->execute([':id' => $userId]);
$premioUser = $stmt->fetch()['idPremio'];

$_SESSION['premioUser'] = $premioUser;

// Sorteia premio em array
$novoPremio = $premiosDisponiveis[rand(1, count($premiosDisponiveis))-1];

// Busca id do prêmio sorteado
$stmt = $conn->prepare("SELECT id FROM premio WHERE nome = :nome");
$stmt->execute([':nome' => $novoPremio]);
$idPremioNovo = $stmt->fetch()['id'];

$_SESSION['idPremio'] = $idPremioNovo;

if ($idPremioNovo == $premioUser) {
    $message = '
    <h2>Outro(a) '.$novoPremio.' :(</h2>
    <p>Infelizmente não podemos te entregar outro(a).</p>
    <p>Mas você pode tentar encontrar outros prêmios para trocar por este!</p>
    <div id="buttonContainer" class="d-flex flex-column align-items-center justify-content-center mt-4">
        <form method="POST" action="' . $BASE_URL . 'forms/guardiao_opcoes.php" class="w-100 text-center">
            <input type="hidden" name="opcao" value="32">
            <button id="returnButton" class="btn-custom optBtn fs-6 fs-sm-5 py-2 w-100" style="max-width: 250px;" type="submit">
                Voltar ao Início
            </button>
        </form>
    </div>
    ';
} else if ($premioUser != NULL) {
    $message = '
    <span id="reward">'.$novoPremio.'!!</span>
    <p>Mas você já ganhou um(a) '.$premios[$premioUser-1].'.</p>
    <form action="' . $BASE_URL . 'forms/guardiao_opcoes.php" method="POST">
        <p>Deseja trocar '.$premios[$premioUser-1].' por '.$novoPremio.'?</p>
        <div class="d-flex justify-content-around">
            <input id="retorno" type="hidden" name="opcao" value="">
            <button class="trocaBtn btn-custom optBtn  w-25 fs-6 fs-sm-5 py-2" onclick="document.getElementById(' . "'retorno'" . ').value = 41">Sim</button>
            <button class="trocaBtn btn-custom optBtn  w-25 fs-6 fs-sm-5 py-2" onclick="document.getElementById(' . "'retorno'" . ').value = 40">Não</button>
        </div>
    </form>';
} else {
    $message = '
    <h2>'.$novoPremio.'!!</h2>
    <p>Vá no RH retirar seu prêmio.</p>
    <p>Ou tente encontrar outros prêmios para trocar por este!</p>

    <div id="buttonContainer" class="d-flex flex-column align-items-center justify-content-center mt-4">
        <form method="POST" action="' . $BASE_URL . 'forms/guardiao_opcoes.php" class="w-100 text-center">
            <input type="hidden" name="opcao" value="32">
            <button id="returnButton" class="btn-custom optBtn fs-6 fs-sm-5 py-2 w-100" style="max-width: 250px;" type="submit">
                Voltar ao Início
            </button>
        </form>
    </div>
    ';

    $stmt = $conn->prepare("UPDATE usuario SET idPremio = :idp WHERE id = :idc");
    $stmt->execute([':idp' => $idPremioNovo,'idc' => $userId]);

    $stmt = $conn->prepare("UPDATE premio SET quantidade = quantidade - 1 WHERE id = :id");
    $stmt->execute([':id' => $idPremioNovo]);
}



// Define o conteúdo principal da página
$content = '
    <header class="text-center py-4">
        <img id="logo" src="' . $BASE_URL . 'Midias/Logo black.png" alt="Logo Life" class="lifeimg img-fluid position-absolute top-0 start-0 m-3" style="max-width: 6em;">
    </header>

    <main class="container-fluid py-4 text-center">
        <section id="mainContainer" class="bg-light border border-4 border-dark rounded-3 p-4 mx-auto" style="max-width: 100%;">

            <h1>Você achou um Baú Misterioso</h1>

            <div class="chestWindow" id="chestWindow">
                <div id="chest" class="standardChest"></div>
                <p>Clique para abrir</p>
            </div>

            <div id="rewardWindow" class="hide">
                <h1>Você ganhou um(a)...</h1>' .
                $message
                .'


</div>
            </div>

            <div id="transition" class="hide"></div>

        </section>
    </main>
';

// Inclui o template principal
include_once('../../templates/layoutBau.php');
?>