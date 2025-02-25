
<?php
$title = "Tela de Login";
$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/curso_php/project_v2-main/"; // Defina a BASE_URL
$content = '
    <header class="text-center py-4">
        <img id="logo" src="' . $BASE_URL . 'Midias/Logo black.png" alt="Logo Life" class="lifeimg img-fluid position-absolute top-0 start-0 m-3" style="max-width: 6em;">
    </header>

    <main class="container-fluid py-4">
        <section id="mainContainer" class="bg-light border border-4 border-dark rounded-3 p-4 mx-auto" style="max-width: 100%;">
            <p class="fs-5 fs-sm-4 text-center">Bem-vindo, bravo aventureiro! Sua jornada começa agora! 
Você deu um passo à frente quando muitos hesitaram. O destino do reino da Life está em suas mãos, e grandes desafios esperam por você!</p>
            <p class="fs-5 fs-sm-4 text-center">A Primeira Missão: O Chamado da Conexão 
O Reino de Pompeia se expandiu, e novas terras precisam ser conectadas. Mas o caminho não será fácil… Criaturas do Caos da Desconexão espreitam, e obstáculos se erguem para testar sua coragem.</p>
 <p class="fs-5 fs-sm-4 text-center">Seu objetivo é claro: trabalhar em equipe, superar desafios e garantir que a magia da conexão nunca se apague! 
Escolha sua classe:</p>
            <!-- Opções listadas -->
            <div class="opcao">
                <p class="mb-0 fs-6 fs-sm-5">1ª Opção: Engenheiro Arcano – Mestre das redes, garante que a energia da fibra ótica flua sem interrupções!</p>
            </div>
            <div class="opcao">
                <p class="mb-0 fs-6 fs-sm-5">2ª Opção: Guardião da Experiência – Um verdadeiro mago do atendimento, garantindo que todos no reino sejam bem cuidados!</p>
            </div>
            <div class="opcao">
                <p class="mb-0 fs-6 fs-sm-5">3ª Opção: Explorador da Inovação – Sempre à frente, trazendo novas ideias e tecnologias para fortalecer a Life!</p>
            </div>
          

            <!-- Botões em formulários -->
            <div id="buttonContainer" class="d-flex flex-column flex-md-row justify-content-around gap-3">
                <form method="POST" action="' . $BASE_URL . 'processar_opcao.php" class="w-100">
                    <input type="hidden" name="opcao" value="1">
                     <button class="btn-custom optBtn  w-100 fs-6 fs-sm-5 py-2" type="submit">Selecionar Opção 1</button>
                </form>
                <form method="POST" action="' . $BASE_URL . 'processar_opcao.php" class="w-100">
                    <input type="hidden" name="opcao" value="2">
                     <button class="btn-custom optBtn  w-100 fs-6 fs-sm-5 py-2" type="submit">Selecionar Opção 2</button>
                </form>
                <form method="POST" action="' . $BASE_URL . 'processar_opcao.php" class="w-100">
                    <input type="hidden" name="opcao" value="3">
                     <button class="btn-custom optBtn  w-100 fs-6 fs-sm-5 py-2" type="submit">Selecionar Opção 3</button>

                </form>
    
            </div>
        </section>
    </main>
';

include_once('../../templates/layout.php');
?>