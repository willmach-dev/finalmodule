<?php
session_start();
// Inclua o arquivo de conexão
include "includes/conexao.php";
$conn = conexao();
// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar os dados do formulário
    $email = filter_input(INPUT_POST, "email", FILTER_DEFAULT);
    $password = filter_input(INPUT_POST, "senha", FILTER_DEFAULT);

    // Consulta SQL para verificar a autenticação
    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":email", $email);
    $stmt->execute();
    $result = $stmt->fetch();

    if (!empty($result)) {
        // Verificar a senha
        if (password_verify($password, $result["senha"])) {
            $_SESSION['email'] = $email;
            // Autenticação bem-sucedida, verifique a permissão
            if ($result["permissao"] == 1) {
                // O usuário é um administrador, redirecionar para a página de administração
                return header("Location: painel_adm.php");
            }
            // O usuário é comum, redirecionar para a página do usuário comum
            return header("Location: painel_usr.php");
        }
    }
    $_SESSION['erro'] = "Nome de usuário ou senha incorretos.";
    return header("Location: login.php");
}
?>
