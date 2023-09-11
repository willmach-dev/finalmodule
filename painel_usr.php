<?php
include 'session.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
    <link rel="stylesheet" type="text/css" href="./css/layout.css">
    <link rel="stylesheet" type="text/css" href="./css/style_painel.css">
    
</head>

<body>
    <!-- Menu lateral -->
    <div class="sidenav">
        <button onclick="redirecionarParaSobre()">Sobre</button><br><br>
        <button onclick="fazerLogout()">Logout</button><br><br> <!-- Botão de logout -->
    </div>
    <div class="container">
        <h1>Bem-vindo ao seu Painel Usu</h1>
        <h2>Esta é a sua área de controle, onde você pode gerenciar suas configurações e interagir com nosso sistema.</h2>
        <h2>No momento o sistema está sendo melhorado e deverá ser atualizado com o tempo</h2>
    </div>
    <script>
        function redirecionarParaSobre() {
            window.location.href = "sobre.php";
        }

        function fazerLogout() {
            window.location.href = "logout.php"; // Redireciona para a página de logout
        }
    </script>
</body>

</html>
