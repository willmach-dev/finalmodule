<?php
session_start();
// Inclua o arquivo de conexão
include("includes/conexao.php");
$conn = conexao();
// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar os dados do formulário
    $email = $_POST["email"];
    $password = $_POST["senha"];
    
    // Consulta SQL para verificar a autenticação (substitua com a estrutura real da sua tabela)
    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":email", $email);
    $stmt->execute();
    $result = $stmt->fetch();

    if (isset($result)) {
         
        // Verificar a senha (substitua com sua própria lógica de hash de senha)
        if (password_verify($password, $result["senha"])) {
            $_SESSION['email'] = $email;
            // Autenticação bem-sucedida, verifique a permissão
            if ($result["permissao"] == 1) {
                // O usuário é um administrador, redirecionar para a página de administração
                header("Location: painel_adm.php");
                exit();
            } else {
                // O usuário é comum, redirecionar para a página do usuário comum
                header("Location: painel_usr.php");
                exit();
            }
        } else {
            // Autenticação falhou, exibir mensagem de erro
            $erro = "Nome de usuário ou senha incorretos.";
        }
    } else {
        // Autenticação falhou, exibir mensagem de erro
        $erro = "Nome de usuário ou senha incorretos.";
    }
}
?>
