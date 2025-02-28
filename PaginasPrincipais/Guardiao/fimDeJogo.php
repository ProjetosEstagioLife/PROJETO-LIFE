<?php
$missaoatual = 0;
$title = "A Carta do Destino";
$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/"; // Defina a BASE_URL
$content = '
    <header class="text-center py-4">
        <img id="logo" src="' . $BASE_URL . 'Midias/Logo black.png" alt="Logo Life" class="lifeimg img-fluid position-absolute top-0 start-0 m-3" style="max-width: 6em;">
    </header>

    <main class="container-fluid py-4">
        <section id="mainContainer" class="bg-light border border-4 border-dark rounded-3 p-4 mx-auto" style="max-width: 100%;">
 <p class="fs-5 fs-sm-4 text-center"> Carta ao Guardião Caído.
 </p>
  <p class="fs-5 fs-sm-4 text-center"> Guardião da Experiência,
 </p>
 <p class="fs-5 fs-sm-4 text-center"> Sua jornada foi repleta de desafios, e cada decisão moldou o destino da Life. Você demonstrou coragem, enfrentou obstáculos e tentou guiar este reino rumo à inovação e excelência. No entanto, nem toda jornada leva à vitória.
 </p>
 <p class="fs-5 fs-sm-4 text-center"> Em algum ponto do caminho, sua escolha não sustentou os pilares do compromisso, da transparência e do respeito. E assim, o ciclo se encerra para você nesta aventura. Mas lembre-se: cada erro é um aprendizado, e todo grande guardião já enfrentou a queda antes de se reerguer.
 </p>
 <p class="fs-5 fs-sm-4 text-center"> A história da Life continua, e um novo chamado sempre pode surgir. Quando estiver pronto, levante-se, aprimore sua estratégia e tente novamente. O reino precisa de guardiões que nunca deixam de buscar a evolução.
 </p>
 <p class="fs-5 fs-sm-4 text-center"> O fim de um jogo não significa o fim da jornada.
 </p>
 <p class="fs-5 fs-sm-4 text-center"> Assinado, O Conselho dos Guardiões da Life
 </p>

            <!-- Opções listadas -->
            <div class="opcao">
                <p class="mb-0 fs-6 fs-sm-5">1ª Opção: Voltar ao início.</p>
            </div>
           
            <!-- Botões em formulários -->
            <div id="buttonContainer" class="d-flex flex-column flex-md-row justify-content-around gap-3">
                <form method="POST" action="' . $BASE_URL . 'forms/guardiao_opcoes.php" class="w-100">
                    <input type="hidden" name="opcao" value="23">
                    <button class="btn-custom optBtn  w-100 fs-6 fs-sm-5 py-2" type="submit">Selecionar Opção 1</button>
                </form>
            </div>
        </section>
    </main>
';

include_once('../../templates/layoutNormal.php');
?>