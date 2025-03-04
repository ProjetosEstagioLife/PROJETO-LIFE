<?php
$missaoAtual = 8;

$title = "A Carta do Destino";
$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/"; // Defina a BASE_URL
$content = '
    <header class="text-center py-4">
        <img id="logo" src="' . $BASE_URL . 'Midias/Logo black.png" alt="Logo Life" class="lifeimg img-fluid position-absolute top-0 start-0 m-3" style="max-width: 6em;">
    </header>

    <main class="container-fluid py-4">
        <section id="mainContainer" class="bg-light border border-4 border-dark rounded-3 p-4 mx-auto" style="max-width: 100%;">
 <p class="fs-5 fs-sm-4 text-center"> Bravo aventureiro,
 </p>
  <p class="fs-5 fs-sm-4 text-center"> Sua jornada foi grandiosa, mas até os heróis mais destemidos enfrentam momentos de derrota. O destino lhe pregou uma peça e, por um instante, parece que tudo está perdido. Mas no mundo da Life, a verdadeira vitória nem sempre está onde esperamos.
 </p>
 <p class="fs-5 fs-sm-4 text-center"> Diante de você, um baú misterioso repousa no chão. Seu brilho enfraquecido sugere que há algo dentro… mas será um grande prêmio ou apenas o vazio do destino?
 </p>
 <p class="fs-5 fs-sm-4 text-center"> A decisão está em suas mãos: abrir o baú e descobrir o que o espera ou aceitar sua derrota e partir?
 </p>
 <p class="fs-5 fs-sm-4 text-center"> Se escolher abrir… poderá encontrar uma recompensa inesperada por sua missão até aqui. Ou talvez apenas o silêncio de um baú vazio.
 </p>
 <p class="fs-5 fs-sm-4 text-center"> Assinado, O Conselho dos Guardiões da Life
 </p>

            <!-- Opções listadas -->
            <div class="opcao">
                <p class="mb-0 fs-6 fs-sm-5">1ª Opção: Abrir Baú.</p>
            </div>
           
            <!-- Botões em formulários -->
            <div id="buttonContainer" class="d-flex flex-column flex-md-row justify-content-around gap-3">
                <form method="POST" action="' . $BASE_URL . 'forms/engenheiro_opcoes.php" class="w-100">
                    <input type="hidden" name="opcao" value="23">
                    <button class="btn-custom optBtn  w-100 fs-6 fs-sm-5 py-2" type="submit">Selecionar Opção 1</button>
                </form>
            </div>
        </section>
    </main>
';

include_once('../../templates/layoutNormal.php');
?>