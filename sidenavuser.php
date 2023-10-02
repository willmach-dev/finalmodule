    <!-- Menu lateral -->
    <div class="sidenav">
        <button onclick="redirecionarParaSobre()">Sobre</button><br><br>
        <button onclick="fazerLogout()">Logout</button><br><br> <!-- Botão de logout -->
    </div>
    <div class="painel">
        <h1>Bem-vindo ao seu Painel Usu</h1>
        <h2>Esta é a sua área de controle, onde você pode gerenciar suas configurações e interagir com nosso sistema.</h2>
        <h2>No momento o sistema está sendo melhorado e deverá ser atualizado com o tempo</h2>
    </div>
    <script>
        function redirecionarParaSobre() {
            window.location.href = "sobre.php";
        }

        function fazerLogout() {
            window.location.href = "controller/logout.php" // Redireciona para a página de logout
        }
    </script>