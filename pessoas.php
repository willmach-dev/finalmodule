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
            window.location.href = "produtos.php";
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
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Senha</th>
                <th>CPF</th>
                <th>Permissão</th>
                <th>Ações</th> <!-- Coluna para ações -->
            </tr>
            <?php
            
            $sql = "SELECT id,nome, email, senha, cpf, permissao FROM usuarios";

            // Executa a consulta
            $stmt = $conn->query($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            if (isset($result)) {
                foreach ($result as $row) {
                    echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["nome"] . "</td>
                            <td>" . $row["email"] . "</td>
                            <td>" . $row["senha"] . "</td>
                            <td>" . $row["cpf"] . "</td>
                            <td>" . $row["permissao"] . "</td>
                            <td>
                                <a href='controller/editar_usuario.php?id=" . $row["id"] . "'>Editar</a> |
                                
                                <a href='controller/excluir_usuario.php?id=" . $row["id"] . "'>Excluir</a>
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
