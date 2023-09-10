<?php
// Inicialize a variável de mensagem
$mensagem = "";
include("../includes/conexao.php");
// Verifique se o ID do usuário foi fornecido na URL
if (isset($_GET['id'])) {
    // Recupere o ID do usuário da URL
    $id = $_GET['id'];

    // Verifique se o formulário de edição foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recupere os dados do formulário
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha']; // Nova senha

        // Validação de entrada (adicione validações mais rigorosas conforme necessário)

        // Verifique se a senha foi alterada
        if (!empty($senha)) {
            // Gerar hash para a nova senha
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            // Prepare e execute a consulta SQL de atualização, incluindo a nova senha hash
            $sql = "UPDATE usuarios SET nome = ?, email = ?, senha = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $nome, $email, $senhaHash, $id);

            // Define a mensagem de sucesso
            $mensagem = "Dados do usuário atualizados com sucesso, incluindo a senha.";
        } else {
            // Se a senha não foi alterada, apenas atualize os outros campos
            $sql = "UPDATE usuarios SET nome = ?, email = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssi", $nome, $email, $id);

            // Define a mensagem de sucesso
            $mensagem = "Dados do usuário atualizados com sucesso, sem alterações na senha.";
        }

        if ($stmt->execute()) {
            // Redirecione de volta à página de visualização de usuários após a atualização
            header("Location: ../pessoas.php");
            exit;
        } else {
            echo "Erro ao atualizar o usuário: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }

    // Caso contrário, você pode exibir o formulário de edição
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Exiba o formulário de edição com os dados do usuário
        ?>
        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Usuário</title>
            <link rel="stylesheet" type="text/css" href="../css/style_painel.css">
            <link rel="stylesheet" type="text/css" href="../css/layout.css"> <!-- Adicione um arquivo CSS para o layout -->
        </head>
        <body>
            <div class="content">
                <h1>Editar Usuário</h1>
                <?php
                // Exiba a mensagem de sucesso se existir
                if (!empty($mensagem)) {
                    echo "<p>$mensagem</p>";
                }
                ?>
                <form method="post">
                    <input type="text" name="nome" value="<?php echo $row['nome']; ?>">
                    <input type="text" name="email" value="<?php echo $row['email']; ?>">
                    <input type="password" name="senha" placeholder="Nova Senha">
                    <input type="submit" value="Salvar">
                </form>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "Usuário não encontrado.";
    }

    $conn->close();
} else {
    echo "ID de usuário não fornecido.";
}
?>
