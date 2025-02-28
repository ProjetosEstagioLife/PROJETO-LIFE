<?php
$missaoAtual = 0;
$title = "Carta ao Guardião Vitorioso";
ob_start();
?>

<div class="container py-3">
    <div class="row justify-content-center align-items-center">
        <!-- Texto principal com fundo semitransparente -->
        <div class="col-12 col-lg-6 text-center bg-dark bg-opacity-75 text-white p-4 rounded">
            <h1 class="fw-bold display-4">Carta ao Guardião Vitorioso</h1>
            <p class="lead">Parabéns, Guardião da Experiência!</p>
            <p class="card-text">Sua jornada foi marcada por escolhas sábias e pela incorporação dos valores fundamentais que tornam a Life um reino forte e inovador. Você superou os desafios com compromisso, transparência e respeito, levando a missão de melhorar a vida das pessoas à frente, sempre com foco na excelência no atendimento.</p>
            <p class="card-text">Sua habilidade em conduzir essa jornada e seu compromisso com a visão de ser a maior e melhor operadora regional multisserviços foram os pilares que garantiram sua vitória. Você não apenas completou sua missão, mas a transformou em uma verdadeira lenda dentro do reino.</p>
            <p class="card-text">O reino da Life cresce mais forte com heróis como você. Agora, sua história será contada entre os grandes, e sua missão continuará, pois a evolução nunca para.</p>
            <p class="card-text">Que sua experiência inspire outros a seguir seu exemplo, buscando sempre a inovação e a excelência. O próximo capítulo aguarda, e o futuro da Life brilha mais forte com você à frente. Diante de você, um baú misterioso repousa no chão, abra para encontrar uma recompensa pela sua bela batalha!</p>
            <p class="card-text">Assinado, O Conselho dos Guardiões da Life</p>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include_once('../../templates/layoutNormal.php');
?>
