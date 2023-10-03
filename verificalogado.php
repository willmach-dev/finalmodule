<?php
// Verificar se o usuário está logado
if (!isset($_SESSION['email'])) {
    // Redirecionar para a página de login se não estiver logado
    header("Location: login.php");
    exit();
}

// Verificar se o usuário tem permissão de administrador
include("includes/conexao.php");
$conn = conexao();
$email = $_SESSION['email'];

$sql = "SELECT permissao FROM usuarios WHERE email = :email";
$stmt = $conn->prepare($sql);
$stmt->bindValue(":email", $email);
$stmt->execute();
$result = $stmt->fetch();

if ($result["permissao"] != 1) {
    // Redirecionar para a página de usuário comum se não for um administrador
    header("Location: painel_usr.php");
    exit();
}
