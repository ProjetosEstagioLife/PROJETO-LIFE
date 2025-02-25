<?php
  // Definindo a Base URL correta
  $BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/curso_php/project_v2-main/";
  $title = "Aventura Life";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>

    <!-- CSS -->
    <link rel="stylesheet" href="<?= $BASE_URL ?>css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <header class="text-center py-4">
        <img id="logo" src="<?= $BASE_URL ?>Midias/Logo black.png" alt="Logo Life" class="img-fluid position-absolute top-0 start-0 m-3" style="max-width: 6em;">
        <h1 class="display-4 fw-bold">1º Desafio</h1>
    </header>

    <main class="container-fluid py-4">
        <section id="mainContainer" class="bg-light border border-4 border-dark rounded-3 p-4 mx-auto" style="max-width: 100%;">
            <p class="fs-5 text-center">Vocês estão prontos para embarcar em uma jornada épica, repleta de desafios e diversão? O portal para um novo mundo está se abrindo, e apenas os colaboradores mais corajosos poderão entrar! :</p>
            
            <!-- Opções listadas -->
            <div class="opcao">
                <p class="mb-0">1ª Opção: Tô Pronto!.</p>
            </div>
            <div class="opcao">
                <p class="mb-0">2ª Opção: Bora começar o desafio!.</p>
            </div>
            <div class="opcao">
                <p class="mb-0">3ª Opção: Com Certeza!</p>
            </div>
            <div class="opcao">
                <p class="mb-0">4ª Opção: Vou partir nessa aventura!</p>
            </div>

            <!-- Botões em formulários -->
            <div id="buttonContainer" class="d-flex flex-column flex-md-row justify-content-around gap-3">
                <form method="POST" action="<?= $BASE_URL ?>processar_opcao.php" class="w-100">
                    <input type="hidden" name="opcao" value="1">
                    <button class="optBtn btn btn-primary w-100" type="submit">Selecionar Opção 1</button>
                </form>
                <form method="POST" action="<?= $BASE_URL ?>processar_opcao.php" class="w-100">
                    <input type="hidden" name="opcao" value="2">
                    <button class="optBtn btn btn-primary w-100" type="submit">Selecionar Opção 2</button>
                </form>
                <form method="POST" action="<?= $BASE_URL ?>processar_opcao.php" class="w-100">
                    <input type="hidden" name="opcao" value="3">
                    <button class="optBtn btn btn-primary w-100" type="submit">Selecionar Opção 3</button>
                </form>
                <form method="POST" action="<?= $BASE_URL ?>processar_opcao.php" class="w-100">
                    <input type="hidden" name="opcao" value="4">
                    <button class="optBtn btn btn-primary w-100" type="submit">Selecionar Opção 4</button>
                </form>
            </div>
        </section>
    </main>

    <footer class="text-center py-3">
        <p class="mb-0">Copyright 2025 - Life. Todos os direitos reservados.</p>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="<?= $BASE_URL ?>js/script.js"></script>
</body>
</html>
