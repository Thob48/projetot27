<?php
include("../conectadb.php");

#Busca a Variavel de Sesão do usuario
session_start();
$idcliente = $_SESSION['idcliente'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idproduto = $_POST['idproduto'];
    $nomeproduto = $_POST['nomeproduto'];
    $descricao = $_POST['descricao'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $totalparcial = ($preco * $quantidade);

    #VARIAVEL CRIADA PARA INDENTIFICAÇAO DO CARRINHO
    $numerocarrinho = MD5($_SESSION['idcliente'] . date('d-m-Y-H:i'));

    if ($idcliente <= 0) {
        echo "<script>window.alert('VOCE PRECISA LOGAR ANTES DE ADICONAR UM ITEM');</script>";
        echo "<script>window.location.href='loja.php';</script>";
    }
    else {
        # code...
    
    #VERIFICA SE O CARRINHO EXISTE
    $sql = "SELECT COUNT(numero_carrinho) FROM itens_carrinho INNER JOIN clientes ON 
  fk_cli_id=cli_id WHERE cli_id='$idcliente' AND carrinho_finalizado='n'";
    echo($sql);
    $resultado = mysqli_query($link, $sql);
    while (mysqli_fetch_array($resultado)) {
        $cont = $tbl[0];
        if ($cont == 0) {
            $sql = "INSERT INTO itens_carrinho(fk_pro_id,item_quantidade,fk_cli_id,valor_carrinho,numero_carrinho,carrinho_finalizado)
    Values('$idproduto','$quantidade','$idcliente','$totalparcial','$numerocarrinho','n')";
            mysqli_query($link, $sql);

            echo "<script>windos.alert('PRODUTO ADICIONADO!);<script>";
            header("location:loja.php");
        } else {
            //verfica qual é do carrinho da pessoa
            $sql = "SELECT DISTINCT(numero_carrinho) FROM itens_carrinho WHERE fk_cli_id='$idcliente'AND carrinho_finalizado='n'";
            $resultado2 = mysqli_query($link, $sql);
            while ($tbl2 = mysqli_fetch_array($resultado2)) {
                $numerocarrinhocliente = $tbl2[0];
                $sql2 = "INSERT INTO itens_carrinho (fk_pro_id,item_quantidade,fk_cli_id,valor_carrinho,numero_carrinho,carrinho_finalizado)
        Values('$idproduto','$quantidade','$idcliente','$totalparcial','$numerocarrinhocliente','n')";
                mysqli_query($link, $sql);
                echo "<script>windos.alert('PRODUTO ADICIONADO AO CARRINHO $numerocarrinhocliente');<script>";
                header("location:.php");
            }
        }

    }

}
}
$idproduto = $_GET['id'];
$sql = "SELECT * FROM produtos WHERE pro_id='$idproduto'";
$resultado = mysqli_query($link, $sql);
while ($tbl = mysqli_fetch_array($resultado)) {
    $nome = $tbl[1];
    $descricao = $tbl[2];
    $preco = $tbl[4];
    $imagenatual = $tbl[6];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../newestilo.css">
    <title>VER PRODUTO</title>
</head>

<body>
    <div>
        <form action="verproduto.php" method="post">
            <input type="hidden" name="idproduto" value="<?= $idproduto ?>" required>
            <label>NOMEPRODUTO</label>
            <input type="text" name="nome" value="<?= $nome ?>" required disabled>
            <label>DESCRIÇÃO</label>
            <input type="text" name="descricao" value="<?= $descricao ?>" required disabled>
            <label>QUANTIDADE</label>
            <input type="number" name="quantidade" required>
            <br>
            <label>PREÇO</label>
            <input type="decimal" name="preco" value="<?= $preco ?>" required>
            <br>
            <img src="data:image/jpeg;base64,<?= $imagenatual ?>" width="150" height="150">

            <input type="submit" value="adicionar ao carrinho">
        </form>
    </div>

</body>

</html>