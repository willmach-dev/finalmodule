<?php
include_once 'session.php';
include_once 'includes/conexao.php';
$conn = conexao();
?>
<div id="sidenav">
    <?= 'navuser.php'; ?>
</div>
<!-- Fim menu lateral-->
<div class="table-container">
    <h1>Produtos</h1>
    <?php
    $sql = "SELECT id, nomeproduto, valorproduto FROM produtos";

    // Executa a consulta
    $stmt = $conn->query($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    if (isset($result)) {
        echo "<section style='display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem;'>";
        foreach ($result as $row) {
            echo "
                <a style='border: 2px solid #eee; border-radius: 8px;' href='mostrar_produto.php?id={$row["id"]}' title='{$row["nomeproduto"]}'>
                    <img style='width: 100%;' src='https://placehold.co/250x250/png' alt=''>
                    <div style='display: flex; flex-direction: column; text-align: center; padding: 8px;'>
                        <h2>{$row["nomeproduto"]}</h2>
                        <p>R$ {$row["valorproduto"]}</p>
                        <span>vr tem desconto</span>
                    </div>
                </a>
            ";
        }
        echo "</section>";
    } else {
        echo "Nenhum resultado encontrado.";
    }
    ?>
</div>
</body>

</html>
