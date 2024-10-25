<?php
// inserir.php
include "conexao.php";

// Verifica se os dados foram enviados corretamente
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $salario = $_POST['salario'];
    $sexo = $_POST['sexo'];
    $cargo = $_POST['cargo'];

    // 1º Passo - Comando SQL para inserir os dados
    $sql = "INSERT INTO tb_cadastro 
            (nome, data_nascimento, salario, sexo, cargo) 
            VALUES 
            (:nome, :data_nascimento, :salario, :sexo, :cargo)";

    // 2º Passo - Preparar a conexão
    $inserir = $pdo->prepare($sql);

    // 3º Passo - Tentar executar
    try {
        $inserir->execute([
            ':nome' => $nome,
            ':data_nascimento' => $data_nascimento,
            ':salario' => $salario,
            ':sexo' => $sexo,
            ':cargo' => $cargo
        ]);
        
        // Redireciona para a página de agradecimento
        header("Location: agradecimento.html");
        exit();
    } catch (PDOException $erro) {
        echo "Falha ao inserir: " . $erro->getMessage();
    }
} else {
    echo "Método inválido.";
}
?>
