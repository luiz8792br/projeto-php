<?php
    include "verificar_logado.php";
?>
<!-- pagina_gerenciar.php -->
<h1>Produtos cadastrados</h1>
<form action="" method="get">
    <input type="text" 
           name="palavra_pesquisada"
           placeholder="Digite um termo para pesquisar"
           size="60">

    <button type="submit">🔎Pesquisar</button>
</form>

<div id="produtos">
<link rel='stylesheet' href='estilo.css'>
<?php
include "conexao.php";

// 1º Passo - Comando SQL
$sql = "SELECT * FROM tb_veiculos";

if(isset($_GET['palavra_pesquisada'])){
    $termo = $_GET['palavra_pesquisada'];
    $sql = "SELECT * FROM tb_veiculos
            WHERE placa LIKE '%$termo%' ";
}
// 2º Passo - Preparar a conexão
$consultar = $pdo->prepare($sql);
// 3º Passo - Tentar executar
try{
   $consultar->execute();
   if($consultar->rowCount() == 0){
       echo "Nenhum produto encontrado";
   }
   $resultados = $consultar->fetchAll(PDO::FETCH_ASSOC);
   foreach($resultados as $item){
        $id_encontrado = $item['id'];
        $modelo = $item['modelo'];
        $placa = $item['placa'];
        $ano = $item['ano'];
        $preco = $item['preco'];
        echo "
            <div class='cartoes'>
                Cod. do produto: $id_encontrado <br>
                $modelo <br>
                R$ $preco <br>
                Placa: $placa <br>
                Ano: $ano<br><br>
                <a href='formulario_editar.php?cod=$id_encontrado'>
                   <button>✏️Editar</button>
                </a>

                <a href='confirmar.php?cod=$id_encontrado'>
                    <button>🗑️Deletar</button>
                </a>
            </div>
        ";

   }

}catch(PDOException $erro){
    echo "Falhar ao consultar!".$erro->getMessage();
}
?>

</div>