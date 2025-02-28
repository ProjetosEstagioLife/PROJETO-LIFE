<?php
  session_start();

  // Definindo a Base URL correta
  $BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/";
  $userId = $_SESSION['user_id'];
  if(!$userId)
  {
     header("Location: " . $BASE_URL . "PaginasPrincipais/fases-iniciais/index.php");
     exit();
 
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
   <script>
    history.pushState(null, document.title, location.href);
window.onpopstate = function(event) {
    history.pushState(null, document.title, location.href);
};
   </script>
    <!-- CSS -->
    <link rel="stylesheet" href="<?= $BASE_URL ?>css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
<header>
    <!-- Cabeçalho -->
    <div class="container">
        <div class="row">
            <div class="col text-end">
                <?php if ($userId): ?>
                    <a href="<?= $BASE_URL ?>forms/logout.php" class="btn btn-custom mt-3">Deslogar</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>

<main>
    <div class="container">
        <?php echo $content; ?>
    </div>
</main>

<footer>
    <div class="container text-center">
        <p>Copyright 2025 - Life. Todos os direitos reservados.</p>
    </div>
</footer>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="<?= $BASE_URL ?>js/script.js"></script>
<script>
    window.history.pushState(null, "", window.location.href);
window.onpopstate = function () {
    window.history.go(1); // Impede o usuário de voltar para a página anterior
};

</script>
</body>
</html>
