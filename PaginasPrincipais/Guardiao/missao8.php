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
 <p class="fs-5 fs-sm-4 text-center"> Carta ao Guardião Derrotado
 </p>
  <p class="fs-5 fs-sm-4 text-center"> Guardião da Experiência,
 </p>
 <p class="fs-5 fs-sm-4 text-center"> Sua jornada até aqui foi repleta de bravura, escolhas difíceis e decisões sábias. No entanto, o destino não sorriu para você desta vez, e sua missão chega ao fim. Mas mesmo no fim de uma jornada, há sempre uma oportunidade de recomeço.
 </p>
 <p class="fs-5 fs-sm-4 text-center"> À sua frente, um baú misterioso aguarda. Talvez ele contenha um prêmio que possa ajudá-lo a continuar sua missão, ou talvez seja vazio, refletindo os desafios não superados. A escolha agora é sua.

 </p>
 <p class="fs-5 fs-sm-4 text-center"> Se você decidir abrir o baú:
 </p>
 <p class="fs-5 fs-sm-4 text-center"> Pode encontrar uma recompensa por sua jornada.
Ou o baú pode estar vazio, simbolizando que, por agora você esta sem sorte!
 </p>
 <p class="fs-5 fs-sm-4 text-center"> Independentemente do que encontrar, lembre-se de que cada derrota traz lições valiosas. A Life não acaba aqui. Um novo chamado sempre estará à espera, e sua jornada de evolução pode começar novamente quando você estiver pronto.
 </p>
 <p class="fs-5 fs-sm-4 text-center"> O que está dentro do baú? A resposta está nas suas mãos.

 </p>
 <p class="fs-5 fs-sm-4 text-center"> Assinado, O Conselho dos Guardiões da Life
 </p>

            <!-- Opções listadas -->
            <div class="opcao">
                <p class="mb-0 fs-6 fs-sm-5">1ª Opção: Abrir Baú.</p>
            </div>
           
            <!-- Botões em formulários -->
            <div id="buttonContainer" class="d-flex flex-column flex-md-row justify-content-around gap-3">
                <form method="POST" action="' . $BASE_URL . 'forms/guardiao_opcoes.php" class="w-100">
                    <input type="hidden" name="opcao" value="27">
                    <button class="btn-custom optBtn  w-100 fs-6 fs-sm-5 py-2" type="submit">Selecionar Opção 1</button>
                </form>
            </div>
        </section>
    </main>
';

include_once('../../templates/layoutNormal.php');
?>