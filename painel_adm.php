<?php

include 'session.php';
include 'verificaadmin.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <link rel="stylesheet" type="text/css" href="./css/nav.css">

</head>
<body>
        <div id="navadm">
            <?php include 'navadm.php'; ?>
        </div>
        <div id="recepcao">
    <!-- Espera para texto do meio caso queira adicionar -->
        <h1>Seja bem vindo administrador</h1>
        <h6>Versão 1.0</h6>
        </div>

</body>
</html>
