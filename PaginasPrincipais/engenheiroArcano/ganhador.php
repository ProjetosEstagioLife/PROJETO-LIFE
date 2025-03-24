<?php
session_start();
$missaoAtual = 0;
$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/"; // Define a URL base
include_once('../../config/db.php');

$title = "Vitória do Engenheiro Arcano";
ob_start();

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
        <form method="POST" action="' . $BASE_URL . 'forms/engenheiro_opcoes.php" class="w-100 text-center">
            <input type="hidden" name="opcao" value="32">
            <button id="returnButton" class="btn-custom  fs-6 fs-sm-5 py-2 w-100" style="max-width: 250px;" type="submit">
                Voltar ao Início
            </button>
        </form>
    </div>
    ';
} else if ($premioUser != NULL) {
    $message = '
    <h2>'.$novoPremio.'!!</h2>
    <p>Mas você já ganhou um(a) '.$premios[$premioUser-1].'.</p>
    <form action="' . $BASE_URL . 'forms/engenheiro_opcoes.php" method="POST">
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
        <form method="POST" action="' . $BASE_URL . 'forms/engenheiro_opcoes.php" class="w-100 text-center">
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
        <!-- Texto principal -->
        <div class="col-12 col-lg-6 text-center">
            <h1 class="fw-bold display-4" style="font-family: 'Comfortaa', sans-serif; font-size: 2.5rem;">A Vitória do Engenheiro Arcano</h1>
            <p class="lead" style="font-family: 'Comfortaa', sans-serif; font-size: 1.25rem;">Bravo aventureiro, sua jornada foi repleta de desafios, mas você seguiu em frente com determinação! com determinação, enfrentando cada obstáculo com inteligência e coragem. Agora, diante do Coração da Rede, você não apenas garantiu a conexão suprema, mas também provou ser um verdadeiro guardião dos valores que sustentam o reino da Life.</p>
            <p class="card-text" style="font-family: 'Comfortaa', sans-serif; font-size: 1rem;">Continue honrando esses valores, pois é isso que transforma aventureiros em lendas. Diante de você, um baú misterioso repousa no chão, abra para encontar uma recompensa  pela sua bela batalha!</p>
                            <p class="card-text" style="font-family: 'Comfortaa', sans-serif; font-size: 1rem;">Assinado, O Conselho dos Guardiões da Life</p>
        </div>

        <!-- Cards -->
        <div class="col-12 col-lg-6">
            <div class="row">
                <!-- Card 1: Compromisso -->
                <div class="col-12 mb-3">
                    <div class="card p-3" style="background-color: rgba(255, 255, 255, 0.3); border-radius: 20px; backdrop-filter: blur(8px); border: 2px solid #000;">
                        <div class="card-body">
                            <h3 class="card-title" style="font-family: 'Comfortaa', sans-serif; font-size: 1.5rem;">Compromisso</h3>
                            <p class="card-text" style="font-family: 'Comfortaa', sans-serif; font-size: 1rem;">Você não hesitou em seguir adiante, assumindo a responsabilidade de levar conexão e inovação a todos os cantos do reino. Sua determinação foi fundamental para o sucesso dessa jornada.</p>
                            <p class="card-text" style="font-family: 'Comfortaa', sans-serif; font-size: 1rem;">Cada passo dado foi uma construção sólida para um futuro mais conectado e eficiente para todos.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Transparência -->
                <div class="col-12 mb-3">
                    <div class="card p-3" style="background-color: rgba(255, 255, 255, 0.3); border-radius: 20px; backdrop-filter: blur(8px); border: 2px solid #000;">
                        <div class="card-body">
                            <h3 class="card-title" style="font-family: 'Comfortaa', sans-serif; font-size: 1.5rem;">Transparência</h3>
                            <p class="card-text" style="font-family: 'Comfortaa', sans-serif; font-size: 1rem;">Em cada decisão tomada, você buscou o caminho certo, agindo com clareza e verdade. Sua transparência se refletiu em ações que trouxeram confiança para todos ao seu redor.</p>
                            <p class="card-text" style="font-family: 'Comfortaa', sans-serif; font-size: 1rem;">Você sabia que a integridade era o alicerce sobre o qual todas as suas vitórias seriam construídas.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Respeito -->
                <div class="col-12">
                    <div class="card p-3" style="background-color: rgba(255, 255, 255, 0.3); border-radius: 20px; backdrop-filter: blur(8px); border: 2px solid #000;">
                        <div class="card-body">
                            <h3 class="card-title" style="font-family: 'Comfortaa', sans-serif; font-size: 1.5rem;">Respeito</h3>
                            <p class="card-text" style="font-family: 'Comfortaa', sans-serif; font-size: 1rem;">Você compreendeu que um verdadeiro herói valoriza aqueles ao seu redor. O espírito de equipe foi essencial para sua conquista.</p>
                            <p class="card-text" style="font-family: 'Comfortaa', sans-serif; font-size: 1rem;">Agora, sua história será contada em cada conexão que fortalece o reino da Life. Mas lembre-se, a jornada nunca termina. Novos desafios surgirão, e sua coragem será sempre necessária.</p>
                        </div>
                    </div>
                </div>
            </div>
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