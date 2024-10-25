<?php    include "verificar_logado.php";  ?>
<!-- pagina_cadastrar.php -->
<h1>Cadastrar Veiculo</h1>
<br>
<form action="cadastrar.php" method="post">
    <label>Modelo do veiculo:</label><br>
    <input type="text" name="descricao_digitada"> <br><br>

    <label>Placa do veiculo:</label><br>
    <input type="number" step="0.01" name="preco_digitado"> <br><br>
    
    <label>Ano:</label><br>
    <input type="text" name="foto_escolhida"> <br><br>
   
    <label>Preço:</label><br>
    <input type="number" name="estoque_digitado"> <br><br>

    <button type="submit">Cadastrar</button>

    
    


</form>