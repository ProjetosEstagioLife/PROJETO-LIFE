<?php

session_start();
$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/PROJETO-LIFE-1/"; // Defina a BASE_URL
$_SESSION = '';
session_destroy();
header("Location: " . $BASE_URL . "PaginasPrincipais/fases-iniciais/index.php");
exit;
?>

