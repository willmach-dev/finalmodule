<?php
include 'session.php';
include 'includes/conexao.php';
$conn = conexao();
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];
    $senha = $_POST["senha"];
   
    // Validação básica dos campos (você pode adicionar mais validações)
    if (empty($nome) || empty($email) || empty($cpf) || empty($senha)) {
        echo "Todos os campos são obrigatórios.";
        exit;
    }

    // Prepara a consulta SQL para inserir os dados na tabela de usuários 
    $sql = "INSERT INTO usuarios (nome, email, cpf, senha) VALUES (?, ?, ?, ?)";

    // Prepara a declaração SQL
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo "Erro na preparação da consulta: ";
        exit;
    }

    // Hash da senha
    $hashedSenha = password_hash($senha, PASSWORD_DEFAULT);

    // Bind dos parâmetros com seus tipos
    $stmt->bindParam(1, $nome, PDO::PARAM_STR);
    $stmt->bindParam(2, $email, PDO::PARAM_STR);
    $stmt->bindParam(3, $cpf, PDO::PARAM_STR);
    $stmt->bindParam(4, $hashedSenha, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso!";
        header("Location: login.php");
    } else {
        echo "Erro ao cadastrar o usuário: " . $stmt->errorInfo()[2];
    }
    // Fecha a conexão com o banco de dados
    $conn = null; // Feche a conexão PDO
} else {
    echo "Acesso não autorizado.";
}
?>
