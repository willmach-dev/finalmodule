<?php
include 'session.php'; // Inclua o arquivo de sessão

// Destrua a sessão atual
session_destroy();

// Redirecione para a página de login ou qualquer outra página de sua escolha
header("Location: login.php");
?>
