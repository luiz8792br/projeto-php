<?php
// login.php
session_start(); // Inicia a sessão

include 'conexao.php'; // Inclui a conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verifica se o email existe no banco de dados
    $sql = "SELECT * FROM tb_usuarios WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Verifica se o usuário foi encontrado
    if ($stmt->rowCount() > 0) {
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica se a senha está correta usando password_verify
        if (password_verify($senha, $usuario['senha'])) {
            // Senha correta, inicia a sessão
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];

            // Redireciona para a página restrita
            header("Location: restrito.php");
            exit();
        } else {
            echo "Senha incorreta!";
        }
    } else {
        echo "Usuário não encontrado!";
    }
} else {
    echo "Método inválido!";
}
?>
