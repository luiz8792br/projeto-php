<?php
// inserir_veiculo.php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $modelo = $_POST['modelo'];
    $placa = $_POST['placa'];
    $ano = $_POST['ano'];
    $preco = $_POST['preco'];

    // SQL para inserir o novo veículo
    $sql = "INSERT INTO tb_veiculos (modelo, placa, ano, preco) VALUES (:modelo, :placa, :ano, :preco)";
    
    $inserir = $pdo->prepare($sql);

    try {
        $inserir->execute([
            ':modelo' => $modelo,
            ':placa' => $placa,
            ':ano' => $ano,
            ':preco' => $preco
        ]);
        echo "Veículo cadastrado com sucesso!";
    } catch (PDOException $erro) {
        echo "Erro ao cadastrar veículo: " . $erro->getMessage();
    }
} else {
    echo "Método inválido!";
}
?>
