<?php
session_start();
$missaoAtual = 0;
$title = "Carta ao Guardião Vitorioso";
ob_start();

$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/"; // Define a URL base
include_once('../../config/db.php');

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
$novoPremio = $premiosDisponiveis[rand(1, count($premiosDisponiveis)) - 1];

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
            <button id="returnButton" class="btn-custom fs-6 fs-sm-5 py-2 w-100" style="max-width: 250px;" type="submit">
                Voltar ao Início
            </button>
        </form>
    </div>
    ';
} else if ($premioUser != NULL) {
    $message = '
    <h2>'.$novoPremio.'!!</h2>
    <p>Mas você já ganhou um(a) '.$premios[$premioUser-1].'.</p>
    <form action="' . $BASE_URL . 'forms/guardiao_opcoes.php" method="POST">
        <p>Deseja trocar '.$premios[$premioUser-1].' por '.$novoPremio.'?</p>
        <div class="d-flex justify-content-around">
            <input id="retorno" type="hidden" name="opcao" value="">
            <button class="trocaBtn btn-custom  w-25 fs-6 fs-sm-5 py-2" onclick="document.getElementById(' . "'retorno'" . ').value = 41">Sim</button>
            <button class="trocaBtn btn-custom  w-25 fs-6 fs-sm-5 py-2" onclick="document.getElementById(' . "'retorno'" . ').value = 40">Não</button>
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

?>

<div class="container py-3">
    <div class="row justify-content-center align-items-center">
        <!-- Texto principal com fundo semitransparente -->
        <div class="col-12 col-lg-6 text-center bg-dark bg-opacity-75 text-white p-4 rounded">
            <h1 class="fw-bold display-4">Carta ao Guardião Vitorioso</h1>
            <p class="lead">Parabéns, Guardião da Experiência!</p>
            <p class="card-text">Sua jornada foi marcada por escolhas sábias e pela incorporação dos valores fundamentais que tornam a Life um reino forte e inovador. Você superou os desafios com compromisso, transparência e respeito, levando a missão de melhorar a vida das pessoas à frente, sempre com foco na excelência no atendimento.</p>
            <p class="card-text">Sua habilidade em conduzir essa jornada e seu compromisso com a visão de ser a maior e melhor operadora regional multisserviços foram os pilares que garantiram sua vitória. Você não apenas completou sua missão, mas a transformou em uma verdadeira lenda dentro do reino.</p>
            <p class="card-text">O reino da Life cresce mais forte com heróis como você. Agora, sua história será contada entre os grandes, e sua missão continuará, pois a evolução nunca para.</p>
            <p class="card-text">Que sua experiência inspire outros a seguir seu exemplo, buscando sempre a inovação e a excelência. O próximo capítulo aguarda, e o futuro da Life brilha mais forte com você à frente. Diante de você, um baú misterioso repousa no chão, abra para encontrar uma recompensa pela sua bela batalha!</p>
            <p class="card-text">Assinado, O Conselho dos Guardiões da Life</p>
        </div>
    </div>
</div>

<section id="victoryRewardContainer" class=" d-flex justify-content-center">
    <div id="victoryRewardWindow" class="d-flex flex-column align-items-center">
        <h1>Você ganhou um(a)...</h1>
        <?php echo $message; ?>
    </div>
</section>

<?php
$content = ob_get_clean();
include_once('../../templates/layoutNormal.php');
?>
