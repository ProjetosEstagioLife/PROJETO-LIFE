<?php
$title = "Vitória do Engenheiro Arcano";
ob_start();
?>

<div class="container text-center" id="welcomeWindow">
    <h1 class="fw-bold display-4" style="font-family: 'Comfortaa', sans-serif;">A Vitória do Engenheiro Arcano</h1>
    <p class="lead" style="font-family: 'Comfortaa', sans-serif;">Bravo aventureiro, sua jornada foi repleta de desafios, mas você seguiu em frente com determinação!</p>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-3 mb-2" style="background-color: rgba(255, 255, 255, 0.3); border-radius: 20px; backdrop-filter: blur(8px); border: 2px solid #000;">
                <div class="card-body">
                    <h3 class="card-title" style="font-family: 'Comfortaa', sans-serif;">Compromisso</h3>
                    <p class="card-text" style="font-family: 'Comfortaa', sans-serif;">Você não hesitou em seguir adiante, assumindo a responsabilidade de levar conexão e inovação a todos os cantos do reino.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-3 mb-2" style="background-color: rgba(255, 255, 255, 0.3); border-radius: 20px; backdrop-filter: blur(8px); border: 2px solid #000;">
                <div class="card-body">
                    <h3 class="card-title" style="font-family: 'Comfortaa', sans-serif;">Transparência</h3>
                    <p class="card-text" style="font-family: 'Comfortaa', sans-serif;">Em cada decisão tomada, você buscou o caminho certo, agindo com clareza e verdade.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-3 mb-2" style="background-color: rgba(255, 255, 255, 0.3); border-radius: 20px; backdrop-filter: blur(8px); border: 2px solid #000;">
                <div class="card-body">
                    <h3 class="card-title" style="font-family: 'Comfortaa', sans-serif;">Respeito</h3>
                    <p class="card-text" style="font-family: 'Comfortaa', sans-serif;">Você compreendeu que um verdadeiro herói valoriza aqueles ao seu redor. O espírito de equipe foi essencial para sua conquista.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container text-center mt-4">
    <h2 class="fw-bold" style="font-family: 'Comfortaa', sans-serif;">O Baú Misterioso</h2>
    <p style="font-family: 'Comfortaa', sans-serif;">Abra para encontrar uma recompensa pela sua bela batalha!</p>
    <button id="loginSubmit" class="btn btn-warning px-4 py-2" onclick="mostrarRecompensa()" style="font-family: 'Comfortaa', sans-serif;">Abrir Baú</button>
    <div id="recompensa" class="hidden mt-3">
        <p class="fw-bold text-success" style="font-family: 'Comfortaa', sans-serif;">Parabéns! Você encontrou um amuleto do conhecimento infinito!</p>
    </div>
</div>
<?php
$content = ob_get_clean();
include_once('../../templates/layout.php');
?>
