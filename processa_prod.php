<?php
require_once("./includes/conexao.php");
$conn = conexao();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["xmlFile"]) && $_FILES["xmlFile"]["error"] == 0) {
        $xmlData = file_get_contents($_FILES["xmlFile"]["tmp_name"]);

        // Fazer o parse do XML usando a extensão SimpleXML
        $xml = simplexml_load_string($xmlData);

        if ($xml === false) {
            die("Erro ao processar o XML.");
        }

        $totalInserido = 0; // Variável para contar o total de produtos inseridos

        try {
            // Preparar a consulta SQL com placeholders
            $sql = "INSERT INTO produtos (nomeproduto, valorproduto, quantidade, descricaoproduto) VALUES (:nome, :valor, :quantidade, :descricao)";
            $stmt = $conn->prepare($sql);

            foreach ($xml->Produto as $produto) {
                // Extrair valores do XML
                $nomeproduto = $produto->nome;
                $valorproduto = (float)$produto->valor;
                $quantidade = (int)$produto->quantidade;
                $descricaoproduto = $produto->descricao;

                // Vincular valores aos placeholders e executar a consulta
                $stmt->execute([
                    ':nome' => $nomeproduto,
                    ':valor' => $valorproduto,
                    ':quantidade' => $quantidade,
                    ':descricao' => $descricaoproduto,
                ]);

                $totalInserido++; // Incrementar o contador de produtos inseridos com sucesso
            }

            // Redirecionar de volta para produto.php com a mensagem de sucesso
            header("Location: produtos_xml.php?mensagem=Registros inseridos com sucesso");
                        exit;
        } catch (PDOException $e) {
            echo "Erro ao inserir os produtos: " . $e->getMessage();
        }
    } else {
        echo "Erro no envio do arquivo XML.";
    }
}

$conn = null; // Feche a conexão PDO
?>
