<?php
include 'session.php';
include 'includes/conexao.php';
$conn = conexao();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta o produto pelo ID
    $sql = "SELECT * FROM produtos WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $produto = $stmt->fetch();

    if ($produto) {
        // Produto encontrado, exclua-o
        $sql = "DELETE FROM produtos WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}

// Redirecione de volta para a página de produtos
header('Location: produtos.php');
exit;
?>
