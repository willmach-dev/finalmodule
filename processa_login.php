<?php
// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar os dados do formulário
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Configurações do banco de dados
    $host = "localhost"; // Endereço do servidor MySQL
    $usuario_bd = "seu_usuario"; // Nome de usuário do banco de dados
    $senha_bd = "sua_senha"; // Senha do banco de dados
    $nome_bd = "seu_banco_de_dados"; // Nome do banco de dados

    // Conectar ao banco de dados MySQL usando MySQLi
    $conn = new mysqli($host, $usuario_bd, $senha_bd, $nome_bd);

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Erro de conexão com o banco de dados: " . $conn->connect_error);
    }

    // Consulta SQL para verificar a autenticação (substitua com a estrutura real da sua tabela)
    $sql = "SELECT * FROM usuarios WHERE username = ?"; // Use "?" para evitar SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Verificar a senha (substitua com sua própria lógica de hash de senha)
        if (password_verify($password, $row["password"])) {
            // Autenticação bem-sucedida, redirecionar para a página de boas-vindas
            header("Location: bem-vindo.php");
            exit();
        } else {
            // Autenticação falhou, exibir mensagem de erro
            $erro = "Nome de usuário ou senha incorretos.";
        }
    } else {
        // Autenticação falhou, exibir mensagem de erro
        $erro = "Nome de usuário ou senha incorretos.";
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
}
?>
