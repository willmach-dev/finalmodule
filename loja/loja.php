<?php
include_once '../session.php';
include_once '../includes/conexao.php';
$conn = conexao();
?>
<div id="nav">
    <!-- Inclua o seu arquivo navuser.php aqui -->
    <?php include '../navuser.php'; ?>
</div>
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
            // Construa o caminho completo da imagem com base no ID do produto
            $imagemProduto = "../uploads/imgs/{$row["id"]}.jpg"; // Assumindo que as imagens são PNG

            // Verifique se a imagem do produto existe no caminho especificado
            if (file_exists($imagemProduto)) {
                // Use a imagem real do produto se ela existir
                echo "
                    <a style='border: 2px solid #eee; border-radius: 8px;' href='mostrar_produto.php?id={$row["id"]}' title='{$row["nomeproduto"]}'>
                        <img style='width: 100%;' src='{$imagemProduto}' alt='{$row["nomeproduto"]}'>
                        <div style='display: flex; flex-direction: column; text-align: center; padding: 8px;'>
                            <h2>{$row["nomeproduto"]}</h2>
                            <p>R$ {$row["valorproduto"]}</p>
                            <span>vr tem desconto</span>
                        </div>
                    </a>
                ";
            } else {
                // Use uma imagem de placeholder caso a imagem do produto não exista
                echo "
                    <a style='border: 2px solid #eee; border-radius: 8px;' href='mostrar_produto.php?id={$row["id"]}' title='{$row["nomeproduto"]}'>
                        <img style='width: 100%;' src='https://placehold.co/250x250/png' alt='{$row["nomeproduto"]}'>
                        <div style='display: flex; flex-direction: column; text-align: center; padding: 8px;'>
                            <h2>{$row["nomeproduto"]}</h2>
                            <p>R$ {$row["valorproduto"]}</p>
                            <span>vr tem desconto</span>
                        </div>
                    </a>
                ";
            }
        }
        echo "</section>";
    } else {
        echo "Nenhum resultado encontrado.";
    }
    ?>
</div>
</body>
</html>
