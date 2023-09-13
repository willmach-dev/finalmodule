<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Inicial</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
<script>
        function redirecionarParaLogin() {
            window.location.href = "login.php";
        }
        function redirecionarParaCadastro() {
            window.location.href = "cadastro.php";
        }
    </script>
</head> <body>
    <div id="central">
        <h1>Pagina inicial</h1>
        <button onclick="redirecionarParaLogin()">Login</button><br><br>  
        <button onclick="redirecionarParaCadastro()">Cadastro</button>  
    </div>
   

</body>
</html>