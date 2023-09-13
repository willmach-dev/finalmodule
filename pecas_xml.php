<?php
include 'session.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peças</title>
    <link rel="stylesheet" type="text/css" href="./css/style_painel.css">
    <link rel="stylesheet" type="text/css" href="./css/layout.css"> <!-- Adicione um arquivo CSS para o layout -->
</head>
<body>
    <!-- Menu lateral -->
    <div class="sidenav">
        <button onclick="redirecionarParaProdutos()">Produtos</button><br><br>
        <button onclick="redirecionarParaPessoas()">Pessoas</button><br><br>
        <button onclick="redirecionarParaPecas()">Peças</button><br><br>
            <button onclick="fazerLogout()">Logout</button><br><br> <!-- Botão de logout -->
    </div>
    <script>
        function redirecionarParaProdutos() {
            window.location.href = "produtos_xml.php";
        }
        function redirecionarParaPessoas() {
            window.location.href = "pessoas.php";
        }
        function fazerLogout() {
        window.location.href = "logout.php"; // Redireciona para a página de logout
        }
        function redirecionarParaPecas() {
            window.location.href = "pecas_xml.php";
        }
    </script>
    <!-- Conteúdo principal -->
    <div class="content">
        <h1>Peças</h1>

        <!-- Formulário para fazer upload do arquivo XML -->
        <form action="processar_xml.php" method="post" enctype="multipart/form-data">
            <label for="xmlFile">Selecione um arquivo XML:</label>
            <input type="file" name="xmlFile" id="xmlFile" accept=".xml">
            <br>
            <input type="submit" value="Enviar XML">
        </form>
    </div>
</body>
</html>
