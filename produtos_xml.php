<?php
include 'session.php';
include 'verificaadmin.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>

    <link rel="stylesheet" type="text/css" href="./css/nav.css">
</head>
<body>
    <!-- Menu lateral -->
    <div id="sidenav">
            <?php include 'navadm.php'; ?>
        </div>
    <script>
        // Função para obter parâmetros da URL
        function obterParametroURL(nome) {
            const urlSearchParams = new URLSearchParams(window.location.search);
            return urlSearchParams.get(nome);
        }

        // Verificar se há uma mensagem na URL
        const mensagem = obterParametroURL('mensagem');

        if (mensagem) {
            // Exibir a mensagem usando um alert ou outro elemento na página
            alert(mensagem);
        }
    </script>
    <!-- Conteúdo principal -->
    <div class="content">
        <h1>Produtos</h1>

        <!-- Formulário para fazer upload do arquivo XML -->
        <form action="processa_prod.php" method="post" enctype="multipart/form-data">
            <label for="xmlFile">Selecione um arquivo XML:</label>
            <input type="file" name="xmlFile" id="xmlFile" accept=".xml">
            <br>
            <input type="submit" value="Enviar XML">
        </form>
    </div>
</body>
</html>
