<?php
$title = "Trajetória 6: A Missão de Simplificar a Vida das Pessoas";
$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/"; // Defina a BASE_URL
$content = '
    <header class="text-center py-4">
        <img id="logo" src="' . $BASE_URL . 'Midias/Logo black.png" alt="Logo Life" class="lifeimg img-fluid position-absolute top-0 start-0 m-3" style="max-width: 6em;">
    </header>

    <main class="container-fluid py-4">
        <section id="mainContainer" class="bg-light border border-4 border-dark rounded-3 p-4 mx-auto" style="max-width: 100%;">
 <p class="fs-5 fs-sm-4 text-center">Uma nova proposta de serviço surge, que pode simplificar a vida dos clientes da Life, mas é necessário mudar processos internos para integrá-la. O que você faz? </p>

            <!-- Opções listadas -->
            <div class="opcao">
                <p class="mb-0 fs-6 fs-sm-5">1ª Opção: Adotar a nova proposta sem revisar os processos internos, esperando que a adaptação seja rápida.</p>
            </div>
            <div class="opcao">
                <p class="mb-0 fs-6 fs-sm-5">2ª Opção: Implementar a mudança de forma planejada e coordenada, com foco na melhoria contínua dos processos internos e simplificação para os clientes. </p>
            </div>
             <div class="opcao">
                <p class="mb-0 fs-6 fs-sm-5">3ª Opção: Optar por não adotar a proposta, achando que os processos atuais são suficientes.</p>
            </div>
           
            <!-- Botões em formulários -->
            <div id="buttonContainer" class="d-flex flex-column flex-md-row justify-content-around gap-3">
                <form method="POST" action="' . $BASE_URL . 'forms/explorador_opcoes.php" class="w-100">
                    <input type="hidden" name="opcao" value="16">
                    <button class="btn-custom optBtn  w-100 fs-6 fs-sm-5 py-2" type="submit">Selecionar Opção 1</button>
                </form>
                <form method="POST" action="' . $BASE_URL . 'forms/explorador_opcoes.php" class="w-100">
                    <input type="hidden" name="opcao" value="17">
                     <button class="btn-custom optBtn  w-100 fs-6 fs-sm-5 py-2" type="submit">Selecionar Opção 2</button>

                </form>
                <form method="POST" action="' . $BASE_URL . 'forms/explorador_opcoes.php" class="w-100">
                    <input type="hidden" name="opcao" value="18">
                     <button class="btn-custom optBtn  w-100 fs-6 fs-sm-5 py-2" type="submit">Selecionar Opção 3</button>

                </form>
            </div>
        </section>
    </main>
';

include_once('../../templates/layout.php');
?>