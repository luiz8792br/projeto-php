<?php
$maquina = "localhost";
$usuario = "root";
$senha = "root";
$nome_do_banco = "bd_atv_02";
$porta = 3306;
try {
    $pdo = new PDO("mysql:host=$maquina;port=$porta;dbname=$nome_do_banco;charset=utf8", "$usuario", "$senha");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conectado com sucesso!";
} catch (PDOException $erro) {
    echo "Falha ao conectar com no BD: $nome_do_banco <br>" . $erro->getMessage();
}
?>