<?php
$missaoAtual = 0;
$title = "A Carta do Destino";
$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/"; // Defina a BASE_URL
$content = '
    <header class="text-center py-4">
        <img id="logo" src="' . $BASE_URL . 'Midias/Logo black.png" alt="Logo Life" class="lifeimg img-fluid position-absolute top-0 start-0 m-3" style="max-width: 6em;">
    </header>

    <main class="container-fluid py-4">
        <section id="mainContainer" class="bg-light border border-4 border-dark rounded-3 p-4 mx-auto" style="max-width: 100%;">
 <p class="fs-5 fs-sm-4 text-center"> Bravo aventureiro, O caminho da grandeza é repleto de desafios, e nem todos chegam ao fim da jornada. Infelizmente, seu destino tomou um rumo sombrio… Seja por um feitiço desconhecido, um cabo mal conectado ou um Guardião implacável, sua aventura termina aqui.
 </p>
  <p class="fs-5 fs-sm-4 text-center"> Mas nem tudo está perdido! Grandes heróis caem para se reerguer ainda mais fortes.
 </p>
 <p class="fs-5 fs-sm-4 text-center"> O reino da Life continua a crescer, e novas missões surgirão. A taverna sempre terá um lugar para aqueles que desejam descansar… mas as portas da aventura nunca se fecham completamente.
 </p>
 <p class="fs-5 fs-sm-4 text-center"> Quando sentir que está pronto para tentar novamente, pegue sua armadura, ajuste seu equipamento e venha reescrever sua lenda!
 </p>
 <p class="fs-5 fs-sm-4 text-center"> Até lá, que os Deuses da Conexão guiem seu caminho!
 </p>
 <p class="fs-5 fs-sm-4 text-center"> Assinado, O Conselho dos Guardiões da Life
 </p>

            <!-- Opções listadas -->
            <div class="opcao">
                <p class="mb-0 fs-6 fs-sm-5">1ª Opção: Voltar ao início.</p>
            </div>
           
            <!-- Botões em formulários -->
            <div id="buttonContainer" class="d-flex flex-column flex-md-row justify-content-around gap-3">
                <form method="POST" action="' . $BASE_URL . 'forms/engenheiro_opcoes.php" class="w-100">
                    <input type="hidden" name="opcao" value="22">
                    <button class="btn-custom optBtn  w-100 fs-6 fs-sm-5 py-2" type="submit">Selecionar Opção 1</button>
                </form>
            </div>
        </section>
    </main>
';

include_once('../../templates/layoutNormal.php');
?>