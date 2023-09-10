<?php
include("../includes/conexao.php");

// Verifica se o parâmetro "id" foi passado na URL
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Prepara a consulta SQL para excluir o usuário com base no ID
    $sql = "DELETE FROM usuarios WHERE id = $id";

    // Executa a consulta
    if ($conn->query($sql) === TRUE) {
        // A exclusão foi bem-sucedida, redirecione de volta para a página de listagem de usuários
        header("Location: ../pessoas.php");
        exit();
    } else {
        echo "Erro ao excluir usuário: " . $conn->error;
    }
} else {
    echo "ID de usuário não especificado.";
}

$conn->close();
?>
