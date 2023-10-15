<?php
include_once 'session.php';
include_once 'includes/conexao.php';
$conn = conexao();

// Verifique se o ID do produto foi passado via GET
if (isset($_GET['id'])) {
    $produto_id = $_GET['id'];

    // Consulta para obter os detalhes do produto
    $sql = "SELECT id, nomeproduto, valorproduto FROM produtos WHERE id = :produto_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':produto_id', $produto_id);
    $stmt->execute();
    $produto = $stmt->fetch();

    if ($produto) {
        $imagemProduto = "uploads/imgs/{$produto['id']}.jpg"; // Caminho da imagem do produto
        ?>
        <!DOCTYPE html>
        <html lang="pt-BR">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Detalhes do Produto</title>
            <link rel="stylesheet" type="text/css" href="css/nav.css">
        </head>
        <body>
            <div id="nav">
                <!-- Inclua o seu arquivo navuser.php aqui -->
                <?php include 'navuser.php'; ?>
            </div>
            <div class="product-details">
                <h1>Detalhes do Produto</h1>
                <div class="product-info">
                    <img src="<?php echo $imagemProduto; ?>" alt="<?php echo $produto['nomeproduto']; ?>">
                    <h2><?php echo $produto['nomeproduto']; ?></h2>
                    <p>R$ <?php echo $produto['valorproduto']; ?></p>
                    <button>Comprar</button>
                </div>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "Produto não encontrado.";
    }
} else {
    echo "ID do produto não fornecido.";
}
?>
