<?php
$title = "Trajetória 3 - O Labirinto de Cabos";
$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/"; // Defina a BASE_URL
$content = '
    <header class="text-center py-4">
        <img id="logo" src="' . $BASE_URL . 'Midias/Logo black.png" alt="Logo Life" class="lifeimg img-fluid position-absolute top-0 start-0 m-3" style="max-width: 6em;">
    </header>

    <main class="container-fluid py-4">
        <section id="mainContainer" class="bg-light border border-4 border-dark rounded-3 p-4 mx-auto" style="max-width: 100%;">
 <p class="fs-5 fs-sm-4 text-center"> Dentro das ruínas do castelo, você encontra uma sala cheia de cabos antigos entrelaçados. Há três caminhos possíveis… </p>

            <!-- Opções listadas -->
            <div class="opcao">
                <p class="mb-0 fs-6 fs-sm-5">1ª Opção: Seguir o fluxo de energia que brilha levemente.</p>
            </div>
            <div class="opcao">
                <p class="mb-0 fs-6 fs-sm-5">2ª Opção: Puxar um cabo aleatório para abrir passagem. </p>
            </div>
             <div class="opcao">
                <p class="mb-0 fs-6 fs-sm-5">3ª Opção: Forçar a entrada em uma porta trancada. </p>
            </div>
           
            <!-- Botões em formulários -->
            <div id="buttonContainer" class="d-flex flex-column flex-md-row justify-content-around gap-3">
                <form method="POST" action="' . $BASE_URL . 'forms/engenheiro_opcoes.php" class="w-100">
                    <input type="hidden" name="opcao" value="7">
                    <button class="btn-custom optBtn  w-100 fs-6 fs-sm-5 py-2" type="submit">Selecionar Opção 1</button>
                </form>
                <form method="POST" action="' . $BASE_URL . 'forms/engenheiro_opcoes.php" class="w-100">
                    <input type="hidden" name="opcao" value="8">
                     <button class="btn-custom optBtn  w-100 fs-6 fs-sm-5 py-2" type="submit">Selecionar Opção 2</button>

                </form>
                <form method="POST" action="' . $BASE_URL . 'forms/engenheiro_opcoes.php" class="w-100">
                    <input type="hidden" name="opcao" value="9">
                     <button class="btn-custom optBtn  w-100 fs-6 fs-sm-5 py-2" type="submit">Selecionar Opção 3</button>

                </form>
            </div>
        </section>
    </main>
';

include_once('../../templates/layout.php');
?>