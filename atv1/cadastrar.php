<?php
include "conexao.php";

$categoria = $_POST['categoria_digitada'];
$autor = $_POST['autor_digitado'];
$ano = $_POST['ano_digitado'];
$titulo = $_POST['titulo_digitado'];

// 1º Passo - Comando SQL
$sql = "INSERT INTO tb_livros
        (titulo, autor, ano_publicacao, categoria)
        VALUES
        ('$titulo', '$autor', '$ano', '$categoria')";
// 2º Passo - Preparar a conexão
$inserir = $pdo->prepare($sql);
// 3º Passo - Tentar executar
try {
    $inserir->execute();
    echo "cadastrado com sucesso";
} catch (PDOException $erro) {
    echo "Falha ao inserir!" . $erro->getMessage();
}
?>
<form action="index.php" method="post">
    <button type="submit">Voltar</button>
</form>