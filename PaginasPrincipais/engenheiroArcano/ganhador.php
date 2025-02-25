<?php
$title = "Vitória do Engenheiro Arcano";
ob_start();
?>

<div class="container text-center py-5" id="welcomeWindow">
    <h1 class="fw-bold">A Vitória do Engenheiro Arcano</h1>
    <p class="lead">Bravo aventureiro, sua jornada foi repleta de desafios, mas você seguiu em frente com determinação!</p>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4" style="background-color: rgba(255, 255, 255, 0.3); border-radius: 30px; backdrop-filter: blur(10px); border: 3px solid #000;">
                <div class="card-body">
                    <h3 class="card-title">Compromisso</h3>
                    <p class="card-text">Você não hesitou em seguir adiante, assumindo a responsabilidade de levar conexão e inovação a todos os cantos do reino.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card p-4" style="background-color: rgba(255, 255, 255, 0.3); border-radius: 30px; backdrop-filter: blur(10px); border: 3px solid #000;">
                <div class="card-body">
                    <h3 class="card-title">Transparência</h3>
                    <p class="card-text">Em cada decisão tomada, você buscou o caminho certo, agindo com clareza e verdade.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card p-4" style="background-color: rgba(255, 255, 255, 0.3); border-radius: 30px; backdrop-filter: blur(10px); border: 3px solid #000;">
                <div class="card-body">
                    <h3 class="card-title">Respeito</h3>
                    <p class="card-text">Você compreendeu que um verdadeiro herói valoriza aqueles ao seu redor. O espírito de equipe foi essencial para sua conquista.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container text-center mt-5">
    <h2>O Baú Misterioso</h2>
    <p>Abra para encontrar uma recompensa pela sua bela batalha!</p>
    <button id="loginSubmit" onclick="mostrarRecompensa()">Abrir Baú</button>
    <div id="recompensa" class="hidden mt-3">
        <p class="fw-bold text-success">Parabéns! Você encontrou um amuleto do conhecimento infinito!</p>
    </div>
</div>

<script>
    function mostrarRecompensa() {
        document.getElementById('recompensa').classList.remove('hidden');
    }
</script>

<?php
$content = ob_get_clean();
include_once('../../templates/layout.php');
?>
