<?php
// restrito.php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    // Redireciona para a página de login se o usuário não estiver logado
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Restrita</title>
</head>
<body>
    <h2>Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?>!</h2>
    <p>Você está acessando uma página restrita.</p>
    <br><a href="./inserir_veiculo.php">Cdastrar veiculo</a><br>
    <a href="./pagina_gerenciar.php">Gerenciar Veiculos</a>
    <a href="logout.php">Sair</a>
</body>
</html>
