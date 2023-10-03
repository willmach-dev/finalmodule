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
    <link rel="stylesheet" type="text/css" href="./css/tabelaprod.css">
    <link rel="stylesheet" type="text/css" href="./css/nav.css">
</head>
<body>
    <div id="sidenav">
            <?php include 'navadm.php'; ?>
        </div>
    <!-- Fim menu lateral-->
    <div class="table-container">
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
                    <td class='table-cell'>" . $row["id"] . "</td>
                    <td class='table-cell'>" . $row["nomeproduto"] . "</td>
                    <td class='table-cell'>" . $row["valorproduto"] . "</td>
                    <td class='table-cell'>" . $row["quantidade"] . "</td>
                    <td class='table-cell'>" . $row["descricaoproduto"] . "</td>
                    <td class='table-cell'>
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
