<!-- formulario_editar.php -->
 <?php
include "verificar_logado.php";
include "conexao.php";
$codigo = $_GET['cod'];

// 1º Passo - Comando SQL
$sql = "SELECT * FROM tb_veiculos WHERE id='$codigo'";

// 2º Passo - Preparar a conexão
$consultar = $pdo->prepare($sql);

// 3º Passo - Tentar executar
try{
    $consultar->execute();
    $resultado = $consultar->fetch(PDO::FETCH_ASSOC);
    $modelo = $resultado['modelo'];
    $preco = $resultado['preco'];
    $ano = $resultado['ano'];
    $placa = $resultado['placa'];
}catch(PDOException $erro){
    echo "Falha ao consultar!".$erro->getMessage();
}
?>

<h1>Atualizar inventário</h1> <br>
<form action="atualizar.php" method="post">
    <input type="text" name="codigo" 
    value='<?php echo $codigo;?>' hidden> 

    <label>Nome do produto:</label><br>
    <input type="text" name="descricao_digitada"
    value='<?php echo $nome;?>'> <br><br>

    <label>Preço:</label><br>
    <input type="number" step="0.01"
    name="preco_digitado" value='<?php echo $preco;?>'> <br><br>

    <label>Estoque:</label><br>
    <input type="number"
    name="estoque_digitado" value='<?php echo $estoque;?>'> <br><br>

    <label>Foto:</label><br>
    <input type="text"
    name="foto_escolhida" value='<?php echo $link;?>'> <br><br>

    <label>Categoria:</label><br>
    <select name="categoria_escolhida">
        <option value="">Selecione</option>
        <option value="Cesta básica" 
          <?php echo $cat=="Cesta básica"? "selected":""; ?> >
          Cesta básica
        </option>
        <option value="Limpeza" 
          <?php echo $cat=="Limpeza"? "selected":""; ?> >
            Limpeza
        </option>
        <option value="Enlatados"
          <?php echo $cat=="Enlatados"? "selected":""; ?> >
            Enlatados
        </option>
        <option value="Molhos"
          <?php echo $cat=="Molhos"? "selected":""; ?> >
            Molhos
        </option>
        <option value="Temperos"
            <?php echo $cat=="Temperos"? "selected":""; ?> >
            Temperos
        </option>
    </select> <br><br>

    <button type="submit">Salvar alterações</button>
</form>