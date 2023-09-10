<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style_form.css">
    <title>Criação de Usuário</title>
</head>
<body>
    <div>
        <h2>Criação de Usuário</h2>
        <form action="processa_cadastro.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required><br><br>
        
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required><br><br>
            
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" placeholder="Exemplo: 123.456.789-10" required><br><br>         
        
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required><br><br>
        
            <label for="confirma_senha">Confirmação de Senha:</label>
            <input type="password" id="confirma_senha" name="confirma_senha" required><br><br>
        
            <input type="submit" id="btncadastro" value="Cadastrar"><br><br>

            <button onclick="redirecionarParaLogin()" id="btncadastro">Voltar para Login</button>
        </form>
    </div>
    <script>
        function redirecionarParaLogin() {
            window.location.href = "login.php";
        }
        document.addEventListener("DOMContentLoaded", function() {
            const senhaField = document.getElementById("senha");
            const confirmaSenhaField = document.getElementById("confirma_senha");

            senhaField.addEventListener("click", function() {
                senhaField.type = "text";
            });

            confirmaSenhaField.addEventListener("click", function() {
                confirmaSenhaField.type = "text";
            });

            senhaField.addEventListener("blur", function() {
                senhaField.type = "password";
            });

            confirmaSenhaField.addEventListener("blur", function() {
                confirmaSenhaField.type = "password";
            });

            const emailField = document.getElementById("email");
            const cpfField = document.getElementById("cpf");

            // Lista de domínios conhecidos
            const dominiosConhecidos = ["gmail.com", "hotmail.com", "outlook.com", "yahoo.com"];

            // Verificação do Email
            emailField.addEventListener("input", function() {
                const email = emailField.value.toLowerCase();
                
                const emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;

                if (!emailRegex.test(email)) {
                    emailField.setCustomValidity("Endereço de e-mail inválido");
                } else if (!dominiosConhecidos.some(dominio => email.endsWith(dominio))) {
                    emailField.setCustomValidity("E-mail não pertence a um domínio conhecido.");
                } else {
                    emailField.setCustomValidity("");
                }

            });

            // Verificação do CPF
            cpfField.addEventListener("input", function() {
                const cpf = cpfField.value;
                // Formato CPF (XXX.XXX.XXX-XX)
                //const cpfRegex = /^(\d{3}\.\d{3}\.\d{3}-\d{2})$/;
                
                if (cpf.length > 11) {
                    cpfField.value = cpf.slice(0, 11);
                } else {
                    cpfField.value = cpf;
                }
                
                if (!cpfRegex.test(cpf)) {
                    cpfField.setCustomValidity("Formato de CPF inválido (use XXX.XXX.XXX-XX)");
                } else {
                    cpfField.setCustomValidity("");
                }
            });
        });
    </script>
</body>
</html>
