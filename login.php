<?php include_once 'session.php' ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
    <link rel="stylesheet" type="text/css" href="./css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>
<body>
    <div id="central">
        <h1>Login</h1>
        <form action="processa_login.php" method="POST" onsubmit="return validarFormulario()">
            <?php
                if(!empty($_SESSION['erro'])) {
                    echo "
                        <div style='background: red;'>
                            <p>Usuário ou senha inválidos</p>
                        </div>
                    ";
                    unset ($_SESSION['erro']);
                }
            ?>
            <input type="text" name="email" id="email" placeholder="E-mail">
            <br><br>
            <input type="password" id="senha" name="senha" placeholder="Digite sua senha"><br><br>

            <button type="button" onclick="mostrarOcultarSenha()" id="senhabt">Mostrar/Ocultar Senha</button>
            <br><br>
            <input type="submit" id="btnlogin" value="Entrar"><br><br>
            <br><br>
            <button type="button" onclick="redirecionarParaInicial()">Voltar para página inicial</button>
        </form>
        <p id="erro" style="color: red; display: none;">Por favor, preencha todos os campos.</p>
    </div>
    <script>
        function redirecionarParaInicial() {
            window.location.href = "index.php";
        }

        function mostrarOcultarSenha() {
            var senhaInput = document.getElementById("senha");

            if (senhaInput.type === "password") {
                senhaInput.type = "text";
            } else {
                senhaInput.type = "password";
            }
        }

        function validarFormulario() {
            var emailInput = document.getElementById("email");
            var senhaInput = document.getElementById("senha");
            var erroMensagem = document.getElementById("erro");

            if (emailInput.value.trim() === "" || senhaInput.value.trim() === "") {
                erroMensagem.style.display = "block";
                return false; // Impede o envio do formulário
            } else {
                erroMensagem.style.display = "none";
                return true; // Permite o envio do formulário
            }
        }

    </script>
</body>
</html>
