<?php
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

    // Verifica se as senhas coincidem
    /*if ($senha !== $confirmaSenha) {
        echo "As senhas não coincidem.";
        exit;  |||| Coloca no validação de campos empty($confirmaSenha)
    }*/

    // Conexão com o banco de dados (substitua pelas suas configurações)
    $servername = "localhost:3306";
    $username = "root";
    $password = "1234";
    $dbname = "progintegra2";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Prepara a consulta SQL para inserir os dados na tabela de usuários (substitua pelo nome correto da sua tabela)
    $sql = "INSERT INTO usuarios (nome, email, cpf, senha) VALUES (?, ?, ?, ?)";

    // Prepara a declaração SQL
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo "Erro na preparação da consulta: " . $conn->error;
        exit;
    }

    // Hash da senha (use uma função segura para hash em produção)
    $hashedSenha = password_hash($senha, PASSWORD_DEFAULT);

    // Bind dos parâmetros e execução da consulta
    $stmt->bind_param("ssss", $nome, $email, $cpf, $hashedSenha);

    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar o usuário: " . $stmt->error;
    }

    // Fecha a conexão com o banco de dados
    $stmt->close();
    $conn->close();
} else {
    echo "Acesso não autorizado.";
}
?>
