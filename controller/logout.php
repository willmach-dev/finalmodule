<?php
include 'session.php'; // Inclua o arquivo de sessão

// Inicie a sessão (se ainda não estiver iniciada)
session_start();

// Destrua a sessão atual
session_destroy();

// Redirecione para a página de login ou qualquer outra página de sua escolha
header("Location: ../login.php");
exit; // Certifique-se de sair após o redirecionamento
?>
