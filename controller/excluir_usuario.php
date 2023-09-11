<?php
include("../includes/conexao.php");
$conn = conexao();

// Verifica se o parâmetro "id" foi passado na URL
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Prepara a consulta SQL para excluir o usuário com base no ID
    $sql = "DELETE FROM usuarios WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    // Executa a consulta
    if ($stmt->execute()) {
        // A exclusão foi bem-sucedida, redirecione de volta para a página de listagem de usuários
        header("Location: ../pessoas.php");
        exit();
    } else {
        echo "Erro ao excluir usuário: " . $stmt->errorInfo()[2];
    }
} else {
    echo "ID de usuário não especificado.";
}
?>
