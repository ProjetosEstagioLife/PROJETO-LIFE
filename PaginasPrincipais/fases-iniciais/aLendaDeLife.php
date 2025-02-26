<?php
$title = "História Inicial";
$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/"; // Defina a BASE_URL
$content = '
    <header class="text-center py-4">
        <img id="logo" src="' . $BASE_URL . 'Midias/Logo black.png" alt="Logo Life" class="lifeimg img-fluid position-absolute top-0 start-0 m-3" style="max-width: 6em;">
    </header>

    <main class="container-fluid py-4">
        <section id="mainContainer" class="bg-light border border-4 border-dark rounded-3 p-4 mx-auto" style="max-width: 100%;">
            <p class="fs-5 fs-sm-4 text-center">Em um reino não tão distante, chamado Pompeia, um sábio conhecido como Alair Fragoso teve uma visão grandiosa. Formado em física, ele viu além das estrelas e sonhou com um mundo interconectado. Nos anos 90, enquanto outros se perdiam em labirintos de números, Alair mergulhou nos mistérios da tecnologia, tornando-se um mago da conexão. Com uma paixão avassaladora, ele fundou sua primeira escola de informática, iluminando as mentes de muitos. O seu destino o levou a abrir um provedor de internet, quando a conexão discada era a magia mais poderosa que existia. Com dez linhas telefônicas e um link de 64k, ele lançou as bases de um império.
 </p>
            <p class="fs-5 fs-sm-4 text-center">Mas a verdadeira aventura começou em 2008, quando Alair se uniu a Oswaldo Zanguetin, um engenheiro eletricista, que também uniu forças e trouxe mais luz. Com suas habilidades em tecnologia e construção de redes, ele ajudou a transformar a visão de Alair em realidade, conectando cidades e trazendo luz onde havia escuridão. Logo após Luiz Eduardo, um arquiteto fantástico e conquistador, se uniu ao time. Luiz, que havia construído redes de TV a cabo em toda a terra, trouxe consigo um espírito indomável e a sabedoria adquirida em batalhas corporativas.
 </p>
 <p class="fs-5 fs-sm-4 text-center">Mas a verdadeira aventura começou em 2008, quando Alair se uniu a Oswaldo Zanguetin, um engenheiro eletricista, que também uniu forças e trouxe mais luz. Com suas habilidades em tecnologia e construção de redes, ele ajudou a transformar a visão de Alair em realidade, conectando cidades e trazendo luz onde havia escuridão. Logo após Luiz Eduardo, um arquiteto fantástico e conquistador, se uniu ao time. Luiz, que havia construído redes de TV a cabo em toda a terra, trouxe consigo um espírito indomável e a sabedoria adquirida em batalhas corporativas.
 </p>
 <p class="fs-5 fs-sm-4 text-center">Juntos, eles sonharam em transformar a Life em um farol de inovação e qualidade, oferecendo serviços no ramo da telecomunicação.
 </p>
  <p class="fs-5 fs-sm-4 text-center">Assim, os três heróis uniram forças para expandir seu reino, enfrentando desafios e construindo uma rede de fibra ótica que conectava as cidades. Cada conquista foi celebrada como uma vitória, e o espírito de equipe transformou a Life em uma lenda viva, onde cada funcionário era um guardião da qualidade e do atendimento.
 </p>
 <p class="fs-5 fs-sm-4 text-center"> Que a história de Alair, Oswaldo e Luiz inspire todos os aventureiros do time da Life. </p>

            <!-- Opções listadas -->
            <div class="opcao">
                <p class="mb-0 fs-6 fs-sm-5">1ª Opção: Preparado para escrever meu nome na história da Life!</p>
            </div>
            <div class="opcao">
                <p class="mb-0 fs-6 fs-sm-5">2ª Opção: Essa jornada parece perigosa demais para mim... Prefiro ficar na taverna contando histórias sobre os verdadeiros heróis! </p>
            </div>
           
            <!-- Botões em formulários -->
            <div id="buttonContainer" class="d-flex flex-column flex-md-row justify-content-around gap-3">
                <form method="POST" action="' . $BASE_URL . 'forms/processar_inicio.php" class="w-100">
                    <input type="hidden" name="opcao" value="5">
                    <button class="btn-custom optBtn  w-100 fs-6 fs-sm-5 py-2" type="submit">Selecionar Opção 1</button>
                </form>
                <form method="POST" action="' . $BASE_URL . 'forms/processar_inicio.php" class="w-100">
                    <input type="hidden" name="opcao" value="6">
                     <button class="btn-custom optBtn  w-100 fs-6 fs-sm-5 py-2" type="submit">Selecionar Opção 2</button>

                </form>
            </div>
        </section>
    </main>
';

include_once('../../templates/layout.php');
?>