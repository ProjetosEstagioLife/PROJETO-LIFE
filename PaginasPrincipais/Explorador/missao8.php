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
 <p class="fs-5 fs-sm-4 text-center"> Carta ao Explorador Derrotado,
 </p>
  <p class="fs-5 fs-sm-4 text-center"> Sua jornada foi repleta de coragem, criatividade e determinação. Embora o destino não tenha lhe concedido a vitória nesta etapa, você foi recompensado com uma última oportunidade de reverter sua sorte: à sua frente, encontra-se um baú misterioso.
 </p>
 <p class="fs-5 fs-sm-4 text-center"> Este baú pode conter um prêmio valioso que o ajudará a seguir adiante em sua missão, ou pode estar vazio, refletindo os desafios ainda por superar. A escolha agora é sua: abrir o baú e descobrir o que o destino preparou para você.
 </p>
 <p class="fs-5 fs-sm-4 text-center">Independentemente do que encontrar, a missão da Life continua. A inovação nunca para, e sempre há uma nova chance para quem está disposto a tentar novamente. A verdadeira vitória está em persistir, aprender com cada experiência e continuar avançando.
 </p>
 <p class="fs-5 fs-sm-4 text-center"> O baú está em suas mãos. O que você vai fazer agora?
 </p>
 <p class="fs-5 fs-sm-4 text-center"> Assinado, O Conselho dos Guardiões da Life
 </p>

            <!-- Opções listadas -->
            <div class="opcao">
                <p class="mb-0 fs-6 fs-sm-5">1ª Opção: Abrir Baú.</p>
            </div>
           
            <!-- Botões em formulários -->
            <div id="buttonContainer" class="d-flex flex-column flex-md-row justify-content-around gap-3">
                <form method="POST" action="' . $BASE_URL . 'forms/explorador_opcoes.php" class="w-100">
                    <input type="hidden" name="opcao" value="27">
                    <button class="btn-custom optBtn  w-100 fs-6 fs-sm-5 py-2" type="submit">Selecionar Opção 1</button>
                </form>
            </div>
        </section>
    </main>
';

include_once('../../templates/layoutNormal.php');
?>