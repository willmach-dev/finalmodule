<?php
include 'session.php';
include_once 'includes/conexao.php';
include 'verificaadmin.php';
$conn = conexao();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>

    <link rel="stylesheet" type="text/css" href="./css/nav.css">
    <link rel="stylesheet" type="text/css" href="./css/tabelausr.css">
</head>
<body>
        <div id="sidenav">
            <?php include 'navadm.php'; ?>
        </div>
    <div class="table-container">
        <h1>Dados do Banco de Dados</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Permissão</th>
                <th>Ações</th> <!-- Coluna para ações -->
            </tr>
            <?php

            $sql = "SELECT id,nome, email, cpf, permissao FROM usuarios";

            // Executa a consulta
            $stmt = $conn->query($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            if (isset($result)) {
                foreach ($result as $row) {
                    echo "<tr>
                    <td class='table-cell'>{$row["id"]}</td>
                    <td class='table-cell'>" . $row["nome"] . "</td>
                    <td class='table-cell'>" . $row["email"] . "</td>
                    <td class='table-cell'>" . $row["cpf"] . "</td>
                    <td class='table-cell'>" . $row["permissao"] . "</td>
                    <td class='table-cell'>
                        <a href='controller/editar_usuario.php?id=" . $row["id"] . "'>Editar</a> |
                        <a href='controller/excluir_usuario.php?id=" . $row["id"] . "'>Excluir</a>
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
