<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "progintegra2";

// Cria a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}
?>
