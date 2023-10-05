<?php
// Verifique se um arquivo foi enviado
if (isset($_FILES['imagem']) && !empty($_FILES['imagem']['name'])) {
    // Diretório onde as imagens serão salvas
    $uploadDir = '../uploads/imgs/';

    // Gere um nome de arquivo único com base no ID do produto
    $nomeArquivo = $_POST['produto_id'] . '.' . pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);

    // Caminho completo para salvar a imagem
    $caminhoCompleto = $uploadDir . $nomeArquivo;

    // Move o arquivo para o diretório de uploads
    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoCompleto)) {
        // Verifique o tipo de imagem
        $tipoImagem = exif_imagetype($caminhoCompleto);

        // Redimensionar a imagem para pixels
        $largura = 250;
        $altura = 250;

        // Crie uma nova imagem em branco com as dimensões desejadas
        $novaImagem = imagecreatetruecolor($largura, $altura);

        // Carregue a imagem original com base no tipo
        switch ($tipoImagem) {
            case IMAGETYPE_JPEG:
                $imagem = imagecreatefromjpeg($caminhoCompleto);
                break;
            case IMAGETYPE_PNG:
                $imagem = imagecreatefrompng($caminhoCompleto);
                break;
            default:
                // Se não for JPEG nem PNG, não redimensione
                $imagem = null;
        }

        if ($imagem) {
            // Redimensione a imagem original para as novas dimensões
            imagecopyresampled($novaImagem, $imagem, 0, 0, 0, 0, $largura, $altura, imagesx($imagem), imagesy($imagem));

            // Salve a nova imagem redimensionada (se for JPEG, salve como JPEG; se for PNG, salve como PNG)
            if ($tipoImagem === IMAGETYPE_JPEG) {
                imagejpeg($novaImagem, $caminhoCompleto);
            } elseif ($tipoImagem === IMAGETYPE_PNG) {
                imagepng($novaImagem, $caminhoCompleto);
            }

            // Libere a memória
            imagedestroy($imagem);
            imagedestroy($novaImagem);
        }

        // Agora atualize o registro do produto no banco de dados com o caminho da imagem
        $produto_id = $_POST['produto_id'];
        $caminhoImagem = 'uploads/imgs/' . $nomeArquivo;

        // Estabeleça a conexão com o banco de dados (se você não tiver feito isso ainda)
        include '../includes/conexao.php';
        $conn = conexao();

        // Atualize o registro do produto com o caminho da imagem
        $sql = "UPDATE produtos SET caminho_imagem = :caminhoImagem WHERE id = :produto_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':caminhoImagem', $caminhoImagem);
        $stmt->bindParam(':produto_id', $produto_id);

        if ($stmt->execute()) {
            // Redirecionar de volta à página de produtos
            header('Location: ../produtos.php');
            exit;
        } else {
            echo 'Erro ao atualizar o registro do produto com o caminho da imagem.';
        }
    } else {
        echo 'Erro ao fazer upload da imagem.';
    }
} else {
    echo 'Nenhum arquivo de imagem foi enviado.';
}
?>
