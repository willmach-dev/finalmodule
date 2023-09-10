<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
    <div>
        <h1>Login</h1>
        <form action="processa_login.php" method="POST">
            <input type="text" name="email" placeholder="E-mail">
            <br><br>
            <input type="password" id="senha" name="password" placeholder="Digite sua senha"><br><br>
            
            <button onclick="mostrarOcultarSenha()" id="senhabt">Mostrar/Ocultar Senha</button>
            <br><br>
            <input type="submit" id="btncadastro" value="Login"><br><br> <!-- Botão "Enviar" dentro do formulário -->
            <br><br>
            <button onclick="redirecionarParaInicial()">Voltar para página inicial</button>  
        </form>
    </div>
    <script>
        function mostrarOcultarSenha() {
            var senhaInput = document.getElementById("senha");

            if (senhaInput.type === "password") {
                senhaInput.type = "text";
            } else {
                senhaInput.type = "password";
            }
        }
    </script>

</body>
</html>
