<?php
include '../session.php';
include '../includes/conexao.php';
$conn = conexao();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta o produto pelo ID
    $sql = "SELECT * FROM produtos WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $produto = $stmt->fetch();

    if (!$produto) {
        // Produto não encontrado, redirecione para a página de produtos
        header('Location: produtos.php');
        exit;
    }
} else {
    // ID não fornecido, redirecione para a página de produtos
    header('Location: produtos.php');
    exit;
}

// Processar o formulário de edição aqui (se houver)
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link rel="stylesheet" type="text/css" href="./css/estilo.css">
</head>
<body>
    <h1>Editar Produto</h1>
    <form method="POST" action="processa_edicao_prod.php">
        <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">

        <label for="nomeproduto">Nome do Produto:</label>
        <input type="text" id="nomeproduto" name="nomeproduto" value="<?php echo $produto['nomeproduto']; ?>">

        <label for="valorproduto">Valor do Produto:</label>
        <input type="text" id="valorproduto" name="valorproduto" value="<?php echo $produto['valorproduto']; ?>">

        <label for="descricaoproduto">Descrição do Produto:</label>
        <textarea id="descricaoproduto" name="descricaoproduto"><?php echo $produto['descricaoproduto']; ?></textarea>

        <label for="quantidade">Quantidade:</label>
        <input type="text" id="quantidade" name="quantidade" value="<?php echo $produto['quantidade']; ?>">

        <button type="submit">Salvar</button>
    </form>
</body>
</html>
