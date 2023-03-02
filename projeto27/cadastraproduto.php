<?php
#Coleta as variáveis do name do html e abre a conexão com Banco
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST['nome'];
    $drescicao=$_POST['descricao'];
    $quantidade=$_POST['quantidade'];
    $preco=$_POST['preco'];
    include("conectadb.php");
#variaveis para coletar informaçoes no banco de dadods sql
    $sql ="SELECT COUNT(prod_id) from produtos WHERE prod_nome = '$nome'";
    $resultado = mysqli_query($link,$sql);
    while($tbl = mysqli_fetch_array($resultado)){
        $cont = $tbl[0];
    }
    #Verificação visual se produto já existe no banco de dados ou não.
    if($cont==1){
        echo"<script>window.alert('PRODUTO JÁ CADASTRADO!');</script>";
    }
    // mostra o alerta se o produto com as memsas informaçoes ja existe no banco de dados
    else{
        $sql = "INSERT INTO produtos (prod_nome, prod_desc,prod_quant,prod_prec) VALUES('$nome', '$drescicao','$quantidade',' $preco','n')";
        mysqli_query($link,$sql);
        header("Location: listaproduto.php");
    }
    // o esle insere as informaçao no listaproduto.php

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>CADASTRO DE PRODUTOS</title>
</head>
<body>
    <a href="homesistema.html"><input type="button" id="menuhome" value="HOME SISTEMA"></a>
   
    </script>
<!-- aqui é a interface do usuario -->
    <form action="cadastraproduto.php" method="POST">
        <h1>CADASTRO DE produtos</h1>
        <input type="text" name="nome" id="nome" placeholder="NOME" required>
        <p></p>
        <input type="text" name="desc" id="desc" placeholder="DESCRIAÇÃO" required>
        <input type="text" name="quant" id="quant" placeholder="QUANTIDADE" required>
        <input type="text" name="preco" id="preco" placeholder="VALOR" required>
        <p></p>
        <input type="submit" name="cadastrar" id="cadastrar" value="CADASTRAR">
    </form>
    </div>
</body>
</html>
