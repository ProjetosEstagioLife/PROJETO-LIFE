<?php
$missaoAtual = 1;
$title = "Trajetória 1 - O Chamado das Redes Perdidas";
$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/"; // Defina a BASE_URL
$content = '
    <header class="text-center py-4">
        <img id="logo" src="' . $BASE_URL . 'Midias/Logo black.png" alt="Logo Life" class="lifeimg img-fluid position-absolute top-0 start-0 m-3" style="max-width: 6em;">
    </header>

    <main class="container-fluid py-4">
        <section id="mainContainer" class="bg-light border border-4 border-dark rounded-3 p-4 mx-auto" style="max-width: 100%;">
 <p class="fs-5 fs-sm-4 text-center"> Um vilarejo enfrenta problemas de conexão. Os moradores estão sem internet e sem comunicação. Como Guardião da Experiência, você precisa agir. </p>

            <!-- Opções listadas -->
            <div class="opcao">
                <p class="mb-0 fs-6 fs-sm-5">1ª Opção: Oferecer uma solução temporária enquanto estuda o problema.</p> 
            </div>
            <div class="opcao">
                <p class="mb-0 fs-6 fs-sm-5">2ª Opção: Dizer aos moradores que devem esperar até que o problema se resolva sozinho. </p>
            </div>
             <div class="opcao">
                <p class="mb-0 fs-6 fs-sm-5">3ª Opção: Investigar a causa do problema e buscar uma solução definitiva. </p>
            </div>
           
            <!-- Botões em formulários -->
            <div id="buttonContainer" class="d-flex flex-column flex-md-row justify-content-around gap-3">
                <form method="POST" action="' . $BASE_URL . 'forms/guardiao_opcoes.php" class="w-100">
                    <input type="hidden" name="opcao" value="1">
                    <button class="btn-custom optBtn  w-100 fs-6 fs-sm-5 py-2" type="submit">Selecionar Opção 1</button>
                </form>
                <form method="POST" action="' . $BASE_URL . 'forms/guardiao_opcoes.php" class="w-100">
                    <input type="hidden" name="opcao" value="2">
                     <button class="btn-custom optBtn  w-100 fs-6 fs-sm-5 py-2" type="submit">Selecionar Opção 2</button>

                </form>
                <form method="POST" action="' . $BASE_URL . 'forms/guardiao_opcoes.php" class="w-100">
                    <input type="hidden" name="opcao" value="3">
                     <button class="btn-custom optBtn  w-100 fs-6 fs-sm-5 py-2" type="submit">Selecionar Opção 3</button>

                </form>
            </div>
        </section>
    </main>
';

include_once('../../templates/layout.php');
?>