<?php
include 'session.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página do Usuário</title>
    <style>
        body {
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        #texto {
            font-size: 36px;
            animation: changeColor 5s infinite;
        }

        @keyframes changeColor {
            0% {
                color: red;
            }
            25% {
                color: blue;
            }
            50% {
                color: green;
            }
            75% {
                color: orange;
            }
            100% {
                color: red;
            }
        }
    </style>
</head>
<body>
    <div id="texto">Página do Usuário</div>
</body>
</html>
