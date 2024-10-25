<?php
// atualizar.php
include "verificar_logado.php";
include "conexao.php";
$codigo = $_POST['codigo'];
$preco = $_POST['preco_digitado'];
$link = $_POST['foto_escolhida'];
$cat = $_POST['categoria_escolhida'];
$desc = $_POST['descricao_digitada'];
$quantidade = $_POST['estoque_digitado'];

// 1º Passo - Comando SQL
$sql = "UPDATE tb_produtos SET 
        nome_produto='$desc', preco='$preco',
        estoque='$quantidade', categoria='$cat',
        imagem='$link' WHERE id_produto='$codigo'";
// 2º Passo - Preparar a conexão
$atualizar = $pdo->prepare($sql);
// 3º Passo - Tentar executar
try{
    $atualizar->execute();
    if($atualizar->rowCount()>=1){
        echo "Atualizado com sucesso!";
    }else{
        echo "Falha ao atualizar!";
    }    
}catch(PDOException $erro){
    echo "Falha ao atualizar!".$erro->getMessage();
}

?>