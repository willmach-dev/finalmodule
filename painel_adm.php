<?php
include 'session.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
    <link rel="stylesheet" type="text/css" href="./css/style_painel.css">
</head>
<body>
    <!-- Menu lateral -->
    <div class="sidenav">
        <button onclick="redirecionarParaProdutos()">Produtos</button><br><br>
        <button onclick="redirecionarParaPessoas()">Pessoas</button><br><br>
    </div>
    <script>
        function redirecionarParaProdutos() {
            window.location.href = "produtos.php";
        }
        function redirecionarParaPessoas() {
            window.location.href = "pessoas.php";
        }
    </script>
    
</body>
</html>