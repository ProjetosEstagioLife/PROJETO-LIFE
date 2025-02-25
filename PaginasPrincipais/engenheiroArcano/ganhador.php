<?php
$title = "Vitória do Engenheiro Arcano";
ob_start();
?>

<div class="container py-3">
    <div class="row justify-content-center align-items-center">
        <!-- Texto principal -->
        <div class="col-12 col-lg-6 text-center">
            <h1 class="fw-bold display-4" style="font-family: 'Comfortaa', sans-serif; font-size: 2.5rem;">A Vitória do Engenheiro Arcano</h1>
            <p class="lead" style="font-family: 'Comfortaa', sans-serif; font-size: 1.25rem;">Bravo aventureiro, sua jornada foi repleta de desafios, mas você seguiu em frente com determinação! com determinação, enfrentando cada obstáculo com inteligência e coragem. Agora, diante do Coração da Rede, você não apenas garantiu a conexão suprema, mas também provou ser um verdadeiro guardião dos valores que sustentam o reino da Life.</p>
            <p class="card-text" style="font-family: 'Comfortaa', sans-serif; font-size: 1rem;">Continue honrando esses valores, pois é isso que transforma aventureiros em lendas. Diante de você, um baú misterioso repousa no chão, abra para encontar uma recompensa  pela sua bela batalha!</p>
                            <p class="card-text" style="font-family: 'Comfortaa', sans-serif; font-size: 1rem;">Assinado, O Conselho dos Guardiões da Life</p>
        </div>

        <!-- Cards -->
        <div class="col-12 col-lg-6">
            <div class="row">
                <!-- Card 1: Compromisso -->
                <div class="col-12 mb-3">
                    <div class="card p-3" style="background-color: rgba(255, 255, 255, 0.3); border-radius: 20px; backdrop-filter: blur(8px); border: 2px solid #000;">
                        <div class="card-body">
                            <h3 class="card-title" style="font-family: 'Comfortaa', sans-serif; font-size: 1.5rem;">Compromisso</h3>
                            <p class="card-text" style="font-family: 'Comfortaa', sans-serif; font-size: 1rem;">Você não hesitou em seguir adiante, assumindo a responsabilidade de levar conexão e inovação a todos os cantos do reino. Sua determinação foi fundamental para o sucesso dessa jornada.</p>
                            <p class="card-text" style="font-family: 'Comfortaa', sans-serif; font-size: 1rem;">Cada passo dado foi uma construção sólida para um futuro mais conectado e eficiente para todos.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Transparência -->
                <div class="col-12 mb-3">
                    <div class="card p-3" style="background-color: rgba(255, 255, 255, 0.3); border-radius: 20px; backdrop-filter: blur(8px); border: 2px solid #000;">
                        <div class="card-body">
                            <h3 class="card-title" style="font-family: 'Comfortaa', sans-serif; font-size: 1.5rem;">Transparência</h3>
                            <p class="card-text" style="font-family: 'Comfortaa', sans-serif; font-size: 1rem;">Em cada decisão tomada, você buscou o caminho certo, agindo com clareza e verdade. Sua transparência se refletiu em ações que trouxeram confiança para todos ao seu redor.</p>
                            <p class="card-text" style="font-family: 'Comfortaa', sans-serif; font-size: 1rem;">Você sabia que a integridade era o alicerce sobre o qual todas as suas vitórias seriam construídas.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Respeito -->
                <div class="col-12">
                    <div class="card p-3" style="background-color: rgba(255, 255, 255, 0.3); border-radius: 20px; backdrop-filter: blur(8px); border: 2px solid #000;">
                        <div class="card-body">
                            <h3 class="card-title" style="font-family: 'Comfortaa', sans-serif; font-size: 1.5rem;">Respeito</h3>
                            <p class="card-text" style="font-family: 'Comfortaa', sans-serif; font-size: 1rem;">Você compreendeu que um verdadeiro herói valoriza aqueles ao seu redor. O espírito de equipe foi essencial para sua conquista.</p>
                            <p class="card-text" style="font-family: 'Comfortaa', sans-serif; font-size: 1rem;">Agora, sua história será contada em cada conexão que fortalece o reino da Life. Mas lembre-se, a jornada nunca termina. Novos desafios surgirão, e sua coragem será sempre necessária.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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