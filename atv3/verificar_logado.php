<?php
//Verificar se NÃO EXISTE a variável
// "logado" na sessão
session_start();
if( !isset($_SESSION['logado']) ){
    header("Location: login.php?erro3=sim");
    exit();
}
?>