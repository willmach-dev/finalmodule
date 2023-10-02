    <!-- Menu lateral -->
    
    <div class="sidenav">
        <h2>Painel Admin</h2>
        <button onclick="redirecionarParaProdutos()">Inserir Produtos</button><br><br>
        <button onclick="redirecionarParaPessoas()">Ver Usuarios</button><br><br>
        <button onclick="redirecionarParaPessoas()">Ver Produtos</button><br><br>
        <button onclick="fazerLogout()">Logout</button><br><br> <!-- Botão de logout -->
    </div>
    <script>
        function redirecionarParaProdutos() {
            window.location.href = "produtos_xml.php";
        }
        function redirecionarParaPecas() {
            window.location.href = "pecas_xml.php";
        }
        function redirecionarParaPessoas() {
            window.location.href = "pessoas.php";
        }
        function fazerLogout() {
        window.location.href = "controller/logout.php"; // Redireciona para a página de logout
        }
       
    </script>
    