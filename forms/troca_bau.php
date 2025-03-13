<?php

$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/";

$troca = $_POST["troca"];

if ($troca == 1) {
    $message = '<p>Troca realizada com sucesso!</p>';
} else {
    $message = '<p>Você manteve seu prêmio!</p>';
}

echo $message;

header("Location: " . $BASE_URL . "PaginasPrincipais/engenheiroArcano/missao9.php");

?>