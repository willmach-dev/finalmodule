<?php
// Inclua o arquivo de conexão
include("includes/conexao.php");

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar os dados do formulário
    $email = $_POST["email"];
    $password = $_POST["password"];
    // Consulta SQL para verificar a autenticação (substitua com a estrutura real da sua tabela)
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Verificar a senha (substitua com sua própria lógica de hash de senha)
        if (password_verify($password, $row["senha"])) {
            // Autenticação bem-sucedida, verifique a permissão
            if ($row["permissao"] == 1) {
                // O usuário é um administrador, redirecionar para a página de administração
                header("Location: painel_adm.html");
                exit();
            } else {
                // O usuário é comum, redirecionar para a página do usuário comum
                header("Location: painel_usr.html");
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
