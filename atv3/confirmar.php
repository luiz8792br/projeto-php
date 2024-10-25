<?php
// confirmar.php
$id_produto = $_GET['cod'];
echo "
        <h1> Tem certeza que deseja 
             excluir o item nº $id_produto?
        </h1>
        <br><br>
        <a href='deletar.php?cod=$id_produto'>
            Sim
        </a>
        <br><br>
        <a href='pagina_gerenciar.php'>
            Não
        </a>

    ";
?>