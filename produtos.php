<?php
include 'session.php';
include 'includes/conexao.php';
$conn = conexao();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" type="text/css" href="./css/style_painel.css">
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
            window.location.href = "produtos.php"; // Altere para "produtos.php" para evitar redirecionamentos infinitos
        }
        function redirecionarParaPessoas() {
            window.location.href = "pessoas.php";
        }
        function fazerLogout() {
            window.location.href = "controller/logout.php";  // Redireciona para a página de logout
        }
        function redirecionarParaPecas() {
            window.location.href = "pecas_xml.php";
        }
    </script>
    <!-- Fim menu lateral-->
    <div class="content">
        <h1>Produtos</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome do Produto</th>
                <th>Valor do Produto</th>
                <th>Quantidade</th>
                <th>Descrição do Produto</th>
                <th>Ações</th> <!-- Coluna para ações -->
            </tr>
            <?php
            $sql = "SELECT id, nomeproduto, valorproduto, quantidade, descricaoproduto FROM produtos";

            // Executa a consulta
            $stmt = $conn->query($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            
            if (isset($result)) {
                foreach ($result as $row) {
                    echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["nomeproduto"] . "</td>
                            <td>" . $row["valorproduto"] . "</td>
                            <td>" . $row["quantidade"] . "</td>
                            <td>" . $row["descricaoproduto"] . "</td>
                            <td>
                                <a href='editar_produto.php?id=" . $row["id"] . "'>Editar</a> |
                                <a href='excluir_produto.php?id=" . $row["id"] . "'>Excluir</a>
                                <br><br>
                            </td>
                          </tr>";
                }
            } else {
                echo "Nenhum resultado encontrado.";
            }
            ?>
        </table>
    </div>
</body>
</html>
