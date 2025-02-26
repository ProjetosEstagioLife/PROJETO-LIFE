
<?php
$title = "História Inicial";
$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/"; // Defina a BASE_URL
$content = '
    <header class="text-center py-4">
        <img id="logo" src="' . $BASE_URL . 'Midias/Logo black.png" alt="Logo Life" class="lifeimg img-fluid position-absolute top-0 start-0 m-3" style="max-width: 6em;">
    </header>

    <main class="container-fluid py-4">
        <section id="mainContainer" class="bg-light border border-4 border-dark rounded-3 p-4 mx-auto" style="max-width: 100%;">
            <p class="fs-5 fs-sm-4 text-center">Aventureiro, sua jornada termina aqui... por enquanto!
Nem todos estão prontos para enfrentar os desafios do reino da Life, e tudo bem! Alguns preferem a segurança da taverna, onde as histórias são contadas e as canecas estão sempre cheias. Talvez hoje não seja o dia da sua grande aventura... mas quem sabe no futuro?
 </p>
            <p class="fs-5 fs-sm-4 text-center">As portas do reino estarão sempre abertas para aqueles que desejarem tentar novamente. Quando sentir que está pronto para empunhar sua espada e trilhar o caminho dos heróis, estaremos aqui para recebê-lo! ⚔️✨
 </p>
 <p class="fs-5 fs-sm-4 text-center">Por agora, sua jornada termina, e você não continuará no jogo. Mas lembre-se: todo grande aventureiro já hesitou antes de sua maior conquista. 😉

 </p>
 <p class="fs-5 fs-sm-4 text-center">Se um dia decidir voltar, estaremos esperando! 
 </p>
  

            <!-- Opções listadas -->
            <div class="opcao">
                <p class="mb-0 fs-6 fs-sm-5">1ª Opção: Continuar</p>
            </div>
            <div class="opcao">
                <p class="mb-0 fs-6 fs-sm-5">2ª Opção: Voltar</p>
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
            </div>
        </section>
    </main>
';

include_once('../../templates/layout.php');
?>