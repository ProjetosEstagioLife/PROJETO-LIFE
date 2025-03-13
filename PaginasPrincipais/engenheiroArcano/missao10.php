<?php
session_start();

$missaoAtual = 10; // Define a missão atual
$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/"; // Define a URL base
include_once('../../config/db.php');

// Configura o fuso horário
date_default_timezone_set('America/Sao_Paulo');

// Define o título da página
$title = "Baú Misterioso";



$content = '
    <header class="text-center py-4">
        <img id="logo" src="' . $BASE_URL . 'Midias/Logo black.png" alt="Logo Life" class="lifeimg img-fluid position-absolute top-0 start-0 m-3" style="max-width: 6em;">
    </header>

    <main class="container-fluid py-4 text-center">
        <section id="mainContainer" class="bg-light border border-4 border-dark rounded-3 p-4 mx-auto" style="max-width: 100%;">

            <h1>Você achou um Baú Misterioso</h1>

            <div id="chestWindow">
                <div id="chest" class="standardChest"></div>
                <p>Clique para abrir</p>
            </div>

            <div id="rewardWindow" class="hide">
                <h1>Você ganhou um...</h1>' .
                $message
                .'<p>Vá ao RH retirar seu prêmio.</p>
                <div id="buttonContainer" class="d-flex flex-column align-items-center justify-content-center mt-4">
    <form method="POST" action="' . $BASE_URL . 'forms/engenheiro_opcoes.php" class="w-100 text-center">
        <input type="hidden" name="opcao" value="32">
        <button id="returnButton" class="btn-custom optBtn fs-6 fs-sm-5 py-2 w-100" style="max-width: 250px;" type="submit">
            Voltar ao Início
        </button>
    </form>
</div>

</div>
            </div>

            <div id="transition" class="hide"></div>

        </section>
    </main>
';

// Inclui o template principal
include_once('../../templates/layoutBau.php');
?>