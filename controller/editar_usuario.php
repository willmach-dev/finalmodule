<?php
// Inicialize a variável de mensagem
$mensagem = "";
include("../includes/conexao.php");
$conn = conexao();
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
        $permissao = isset($_POST['permissao']) ? 1 : 0; // Verifica se o checkbox de permissão está marcado

        // Validação de entrada (adicione validações mais rigorosas conforme necessário)

        // Verifique se a senha foi alterada
        if (!empty($senha)) {
            // Gerar hash para a nova senha
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            // Prepare e execute a consulta SQL de atualização, incluindo a nova senha hash e permissão
            $sql = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha, permissao = :permissao WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':senha', $senhaHash, PDO::PARAM_STR);
            $stmt->bindValue(':permissao', $permissao, PDO::PARAM_INT);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            // Define a mensagem de sucesso
            $mensagem = "Dados do usuário atualizados com sucesso, incluindo a senha.";
        } else {
            // Se a senha não foi alterada, apenas atualize os outros campos
            $sql = "UPDATE usuarios SET nome = :nome, email = :email, permissao = :permissao WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':permissao', $permissao, PDO::PARAM_INT);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            // Define a mensagem de sucesso
            $mensagem = "Dados do usuário atualizados com sucesso, sem alterações na senha.";
        }

        if ($stmt->execute()) {
            // Redirecione de volta à página de visualização de usuários após a atualização
            header("Location: ../pessoas.php");
            exit;
        } else {
            echo "Erro ao atualizar o usuário: " . $stmt->errorInfo()[2];
        }
    }

    // Caso contrário, você pode exibir o formulário de edição
    $sql = "SELECT * FROM usuarios WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
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
                    <label for="permissao">Permissão de Administrador</label>
                    <input type="checkbox" name="permissao" id="permissao" <?php if ($row['permissao'] == 1) echo "checked"; ?>>
                    <input type="submit" value="Salvar">
                </form>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "Usuário não encontrado.";
    }
} else {
    echo "ID de usuário não fornecido.";
}
?>
