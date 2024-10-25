<?php
// inserir_usuario.php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Hash da senha

    // SQL para inserir o novo usuário
    $sql = "INSERT INTO tb_usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
    
    $inserir = $pdo->prepare($sql);

    try {
        $inserir->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':senha' => $senha
        ]);
        header("Location: login.html"); 
    } catch (PDOException $erro) {
        echo "Erro ao cadastrar usuário: " . $erro->getMessage();
    }
} else {
    echo "Método inválido!";
}
?>
