<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barra de Navegação - Painel Admin</title>
    <style>
        /* Estilos para a barra de navegação */
        .topnav {
            background-image: linear-gradient(80deg, rgb(228, 40, 25), rgb(255, 174, 0));
            border-radius: 10px; /* Borda arredondada */
            padding: 10px 0; /* Espaçamento interno */
            text-align: center; /* Centralizar os botões */
        }

        /* Estilos para os botões */
        .topnav a, .dropbtn {
            color: white; /* Cor do texto */
            text-decoration: none; /* Remover sublinhado dos links */
            padding: 10px 20px; /* Espaçamento interno nos botões */
            border-radius: 20px; /* Borda arredondada nos botões */
            margin: 5px; /* Margem entre os botões */
            display: inline-block; /* Os botões ficam na mesma linha */
        }

        /* Estilos quando o mouse passa por cima dos botões */
        .topnav a:hover, .dropbtn:hover {
            background-color: #555; /* Cor de fundo quando passa o mouse por cima */
        }

        /* Estilos para o dropdown (menu suspenso) */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #333;
            min-width: 160px;
            z-index: 1;
            border-radius: 10px; /* Borda arredondada do dropdown */
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>
    <nav class="topnav">
        <h2>Painel Admin</h2>
        <div class="dropdown">
            <button class="dropbtn">Produtos</button>
            <div class="dropdown-content">
                <a href="produtos_xml.php">Inserir Produtos</a>
                <a href="produtos.php">Ver Produtos</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Usuários</button>
            <div class="dropdown-content">
                <a href="pessoas.php">Visualizar Usuários</a>
            </div>
        </div>
        <a class="dropbtn" href="controller/logout.php">Fazer Logout</a>
    </nav>
</body>
</html>
