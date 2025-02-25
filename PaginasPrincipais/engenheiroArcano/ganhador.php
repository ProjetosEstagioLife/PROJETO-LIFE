<?php
$title = "Vitória do Engenheiro Arcano";
ob_start();
?>

<div class="container text-center py-3" id="welcomeWindow">
    <h1 class="fw-bold display-4" style="font-family: 'Comfortaa', sans-serif; font-size: 2.5rem;">A Vitória do Engenheiro Arcano</h1>
    <p class="lead" style="font-family: 'Comfortaa', sans-serif; font-size: 1.25rem;">Bravo aventureiro, sua jornada foi repleta de desafios, mas você seguiu em frente com determinação!</p>
</div>

<div class="container">
    <!-- Card 1: Compromisso -->
    <div class="row justify-content-center mb-3">
        <div class="col-12 col-md-6">
            <div class="card p-3" style="background-color: rgba(255, 255, 255, 0.3); border-radius: 20px; backdrop-filter: blur(8px); border: 2px solid #000;">
                <div class="card-body">
                    <h3 class="card-title" style="font-family: 'Comfortaa', sans-serif; font-size: 1.5rem;">Compromisso</h3>
                    <p class="card-text" style="font-family: 'Comfortaa', sans-serif; font-size: 1rem;">Você não hesitou em seguir adiante, assumindo a responsabilidade de levar conexão e inovação a todos os cantos do reino. Sua determinação foi fundamental para o sucesso dessa jornada.</p>
                    <p class="card-text" style="font-family: 'Comfortaa', sans-serif; font-size: 1rem;">Cada passo dado foi uma construção sólida para um futuro mais conectado e eficiente para todos.</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Card 2: Transparência -->
    <div class="row justify-content-center mb-3">
        <div class="col-12 col-md-6">
            <div class="card p-3" style="background-color: rgba(255, 255, 255, 0.3); border-radius: 20px; backdrop-filter: blur(8px); border: 2px solid #000;">
                <div class="card-body">
                    <h3 class="card-title" style="font-family: 'Comfortaa', sans-serif; font-size: 1.5rem;">Transparência</h3>
                    <p class="card-text" style="font-family: 'Comfortaa', sans-serif; font-size: 1rem;">Em cada decisão tomada, você buscou o caminho certo, agindo com clareza e verdade. Sua transparência se refletiu em ações que trouxeram confiança para todos ao seu redor.</p>
                    <p class="card-text" style="font-family: 'Comfortaa', sans-serif; font-size: 1rem;">Você sabia que a integridade era o alicerce sobre o qual todas as suas vitórias seriam construídas.</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Card 3: Respeito -->
    <div class="row justify-content-center mb-3">
        <div class="col-12 col-md-6">
            <div class="card p-3" style="background-color: rgba(255, 255, 255, 0.3); border-radius: 20px; backdrop-filter: blur(8px); border: 2px solid #000;">
                <div class="card-body">
                    <h3 class="card-title" style="font-family: 'Comfortaa', sans-serif; font-size: 1.5rem;">Respeito</h3>
                    <p class="card-text" style="font-family: 'Comfortaa', sans-serif; font-size: 1rem;">Você compreendeu que um verdadeiro herói valoriza aqueles ao seu redor. O espírito de equipe foi essencial para sua conquista.</p>
                    <p class="card-text" style="font-family: 'Comfortaa', sans-serif; font-size: 1rem;">Além disso, a sua capacidade de ouvir e respeitar as opiniões alheias mostrou o quão forte é sua liderança.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Baú Misterioso -->
<div class="container text-center mt-4">
    <h2 class="fw-bold" style="font-family: 'Comfortaa', sans-serif; font-size: 1.75rem;">O Baú Misterioso</h2>
    <p style="font-family: 'Comfortaa', sans-serif; font-size: 1.125rem;">Abra para encontrar uma recompensa pela sua bela batalha!</p>
    <button id="loginSubmit" class="btn btn-warning px-4 py-2" onclick="mostrarRecompensa()" style="font-family: 'Comfortaa', sans-serif; font-size: 1.125rem;">Abrir Baú</button>
    <div id="recompensa" class="hidden mt-3">
        <p class="fw-bold text-success" style="font-family: 'Comfortaa', sans-serif; font-size: 1.125rem;">Parabéns! Você encontrou um amuleto do conhecimento infinito!</p>
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
