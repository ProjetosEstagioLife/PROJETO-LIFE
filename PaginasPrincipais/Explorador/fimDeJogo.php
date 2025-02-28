<?php
$title = "A Carta do Destino";
$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/"; // Defina a BASE_URL
$content = '
    <header class="text-center py-4">
        <img id="logo" src="' . $BASE_URL . 'Midias/Logo black.png" alt="Logo Life" class="lifeimg img-fluid position-absolute top-0 start-0 m-3" style="max-width: 6em;">
    </header>

    <main class="container-fluid py-4">
        <section id="mainContainer" class="bg-light border border-4 border-dark rounded-3 p-4 mx-auto" style="max-width: 100%;">
 <p class="fs-5 fs-sm-4 text-center"> Você enfrentou uma série de desafios em sua jornada e buscou, com coragem, soluções inovadoras para a Life. No entanto, a escolha que você fez não foi suficiente para seguir adiante, e sua missão chegou ao fim nesta etapa.
 </p>
  <p class="fs-5 fs-sm-4 text-center">Não se desanime, pois até nas quedas há aprendizado. O caminho da inovação é repleto de incertezas, mas também de crescimento. Cada erro é uma oportunidade para refinar a estratégia e aprimorar o compromisso com a excelência.
 </p>
 <p class="fs-5 fs-sm-4 text-center"> Embora a jornada tenha terminado por aqui, isso não é o fim. A Life sempre estará à espera de novos exploradores que busquem melhorar a vida das pessoas por meio da inovação.
 </p>
 <p class="fs-5 fs-sm-4 text-center"> Quando estiver pronto, levante-se e tente novamente. Uma nova aventura o aguarda.
 </p>
 <p class="fs-5 fs-sm-4 text-center"> Lembre-se, as portas da inovação nunca se fecham para quem está disposto a aprender.
 </p>
 <p class="fs-5 fs-sm-4 text-center"> Assinado, O Conselho dos Guardiões da Life
 </p>

            <!-- Opções listadas -->
            <div class="opcao">
                <p class="mb-0 fs-6 fs-sm-5">1ª Opção: Voltar ao início.</p>
            </div>
           
            <!-- Botões em formulários -->
            <div id="buttonContainer" class="d-flex flex-column flex-md-row justify-content-around gap-3">
                <form method="POST" action="' . $BASE_URL . 'forms/explorador_opcoes.php" class="w-100">
                    <input type="hidden" name="opcao" value="23">
                    <button class="btn-custom optBtn  w-100 fs-6 fs-sm-5 py-2" type="submit">Selecionar Opção 1</button>
                </form>
            </div>
        </section>
    </main>
';

include_once('../../templates/layout.php');
?>