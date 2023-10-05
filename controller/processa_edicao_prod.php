<?php
include '../session.php';
include '../includes/conexao.php';
$conn = conexao();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'], $_POST['nomeproduto'], $_POST['valorproduto'], $_POST['descricaoproduto'], $_POST['quantidade'])) {
        $id = $_POST['id'];
        $nomeproduto = $_POST['nomeproduto'];
        $valorproduto = $_POST['valorproduto'];
        $descricaoproduto = $_POST['descricaoproduto'];
        $quantidade = $_POST['quantidade'];

        // Atualize o produto no banco de dados
        $sql = "UPDATE produtos SET nomeproduto = :nomeproduto, valorproduto = :valorproduto, descricaoproduto = :descricaoproduto, quantidade = :quantidade WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nomeproduto', $nomeproduto);
        $stmt->bindParam(':valorproduto', $valorproduto);
        $stmt->bindParam(':descricaoproduto', $descricaoproduto);
        $stmt->bindParam(':quantidade', $quantidade);

        if ($stmt->execute()) {
            // Redireciona de volta para a página de produtos após a edição bem-sucedida
            header('Location: ../produtos.php');
            exit;
        } else {
            // Trate os erros de atualização aqui, se necessário
            echo "Erro ao atualizar o produto.";
        }
    } else {
        echo "Campos do formulário não definidos.";
    }
} else {
    // Redirecione para a página de produtos se a solicitação não for POST
    header('Location: ../produtos.php');
    exit;
}
?>
