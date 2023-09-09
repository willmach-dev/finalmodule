<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" type="text/css" href="./css/style_painel.css">
    <link rel="stylesheet" type="text/css" href="./css/layout.css"> <!-- Adicione um arquivo CSS para o layout -->
</head>
<body>
    <!-- Menu lateral -->
    <div class="sidenav">
        <button onclick="redirecionarParaProdutos()">Produtos</button><br><br>
        <button onclick="redirecionarParaPessoas()">Pessoas</button><br><br>
    </div>
    <script>
        function redirecionarParaProdutos() {
            window.location.href = "produtos.html";
        }
        function redirecionarParaPessoas() {
            window.location.href = "pessoas.php";
        }
    </script>
    <!-- Fim menu lateral-->
    <div class="content">
        <h1>Dados do Banco de Dados</h1>
        <table>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Senha</th>
                <th>CPF</th>
                <th>Permissão</th>
            </tr>
            <?php
            include("includes/conexao.php");
            $sql = "SELECT nome, email, senha, cpf, permissao FROM usuarios";

            // Executa a consulta
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["nome"] . "</td><td>" . $row["email"] . "</td><td>" . $row["senha"] . "</td><td>" . $row["cpf"] . "</td><td>" . $row["permissao"] . "</td></tr>";
                }
            } else {
                echo "Nenhum resultado encontrado.";
            }

            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
