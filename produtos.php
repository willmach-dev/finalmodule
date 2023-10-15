<?php
include 'session.php';
include 'includes/conexao.php';
include 'verificaadmin.php';
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
                <th>Imagem</th>
                <th>Ações</th> <!-- Coluna para ações -->
            </tr>
            <?php
            $sql = "SELECT id, nomeproduto, valorproduto, quantidade, descricaoproduto, caminho_imagem FROM produtos";

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
                    <td class='table-cell'><img src='caminho/para/sua/pasta/" . $row["caminho_imagem"] . "' alt='Imagem do Produto' width='100'></td>                    <td class='table-cell'>
                                <a href='./controller/editar_produto.php?id=" . $row["id"] . "'>Editar</a> |
                                <a href='./controller/exclui_produto.php?id=" . $row["id"] . "'>Excluir</a>
                                <br><br>
                                <form method='POST' action='./controller/processa_upload_imagem.php' enctype='multipart/form-data'>
                                    <input type='hidden' name='produto_id' value='" . $row["id"] . "'>
                                    <input type='file' name='imagem'>
                                    <button type='submit'>Enviar Imagem</button>
                                </form>
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
