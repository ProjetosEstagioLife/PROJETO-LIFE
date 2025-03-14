<?php
$missaoAtual = 2; // Defina o número da missão atual

$title = "Trajetória 2 - A Encruzilhada da Fibra Antiga";
$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/"; // Defina a BASE_URL
$content = '
    <header class="text-center py-4">
        <img id="logo" src="' . $BASE_URL . 'Midias/Logo black.png" alt="Logo Life" class="lifeimg img-fluid position-absolute top-0 start-0 m-3" style="max-width: 6em;">
    </header>

    <main class="container-fluid py-4">
        <section id="mainContainer" class="bg-light border border-4 border-dark rounded-3 p-4 mx-auto" style="max-width: 100%;">
 <p class="fs-5 fs-sm-4 text-center"> Após investigar, você descobre que os responsáveis que cortaram os cabos deixaram para tras um mapa que aponta para uma fibra óptica ancestral, enterrada nas ruínas de um castelo. E agora o que fazer? </p>

            <!-- Opções listadas -->
            <div class="opcao">
                <p class="mb-0 fs-6 fs-sm-5">1ª Opção: Pedir ajuda a um mercador local para decifrar o mapa.</p>
            </div>
            <div class="opcao">
                <p class="mb-0 fs-6 fs-sm-5">2ª Opção: Pisar sem cuidado em um piso quebradiço. </p>
            </div>
             <div class="opcao">
                <p class="mb-0 fs-6 fs-sm-5">3ª Opção: Seguir o mapa e explorar o mais rápido possível. </p>
            </div>
           
            <!-- Botões em formulários -->
            <div id="buttonContainer" class="d-flex flex-column flex-md-row justify-content-around gap-3">
                     <form method="POST" action="' . $BASE_URL . 'forms/engenheiro_opcoes.php" class="w-100">
                    <input type="hidden" name="opcao" value="4">
                    <button class="btn-custom optBtn  w-100 fs-6 fs-sm-5 py-2" type="submit">Selecionar Opção 1</button>
                </form>
                <form method="POST" action="' . $BASE_URL . 'forms/engenheiro_opcoes.php" class="w-100">
                    <input type="hidden" name="opcao" value="5">
                     <button class="btn-custom optBtn  w-100 fs-6 fs-sm-5 py-2" type="submit">Selecionar Opção 2</button>

                </form>
                <form method="POST" action="' . $BASE_URL . 'forms/engenheiro_opcoes.php" class="w-100">
                    <input type="hidden" name="opcao" value="6">
                     <button class="btn-custom optBtn  w-100 fs-6 fs-sm-5 py-2" type="submit">Selecionar Opção 3</button>

                </form>
            </div>
        </section>
    </main>
';

include_once('../../templates/layout.php');
?>