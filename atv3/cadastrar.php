<?php
// cadastrar.php
include "conexao.php";

$preco = $_POST['preco_digitado'];
$estoque = $_POST['estoque_digitado'];
$foto = $_POST['foto_escolhida'];
$descricao = $_POST['descricao_digitada'];
$cat = $_POST['categoria_escolhida'];

// 1º Passo - Comando SQL
$sql = "INSERT INTO tb_produtos
        (nome_produto, preco, estoque, categoria, imagem)
        VALUES
        ('$descricao', '$preco', '$estoque', '$cat', '$foto')";
        
// 2º Passo - Preparar a conexão
$inserir = $pdo->prepare($sql);

// 3º Passo - Tentar executar
try{
    $inserir->execute();
    echo "Cadastrado com sucesso"; 
}catch(PDOException $erro){
    echo "Falha ao inserir!". $erro->getMessage();
}

?>