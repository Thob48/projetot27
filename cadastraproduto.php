<?php
 include("conectadb.php");
#Coleta as variáveis do name do html e abre a conexão com Banco
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST['nome'];
    $descricao=$_POST['descricao'];
    $quantidade=$_POST['quantidade'];
    $preco=$_POST['preco'];
    $foto1=$_POST["foto1"];
    // $foto2=$_POST["foto2"];
    if ($foto1=="")$img="semfoto.png";
    $sql="SELECT COUNT (pro_id) FROM produtos WHERE pro_nome='$nome'";
   
#variaveis para coletar informaçoes no banco de dados sql
    $sql="SELECT COUNT(prod_id) from produtos WHERE prod_nome = '$nome'";
    $resultado = mysqli_query($link,$sql);
    while($tbl = mysqli_fetch_array($resultado)){
        $cont = $tbl[0]; 
    #Verificação visual se produto já existe no banco de dados ou não.
    if($cont==1){
        echo"<script>window.alert('PRODUTO JÁ CADASTRADO!');</script>";
    }
    // mostra o alerta se o produto com as memsas informaçoes ja existe no banco de dados
    else{
        $sql = "INSERT INTO produtos (pro_nome, pro_descricao,pro_quantidade,pro_preco,imagem1) VALUES('$nome', '$descricao','$quantidade',' $preco','s','$foto1')";
        mysqli_query($link,$sql);
        header("Location: listaproduto.php");
    }
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
    <link rel="stylesheet" href="newestilo.css">
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
        <input type="text" name="descricao" id="descricao" placeholder="DESCRIAÇÃO" required>
        <input type="text" name="quantidade" id="quantidade" placeholder="QUANTIDADE" required>
        <input type="text" name="preco" id="preco" placeholder="VALOR" required>
        <p></p>
        <input type="submit" name="cadastrar" id="cadastrar" value="CADASTRAR">
        <label>Imagem</label><input type="file" name="foto1" id="img1" onchange="foto1()"><img src="img/semfoto.png" width="100px" id="foto1"></form>
        
    </form>
    <script>function foto1(){document.getElementById("foto1").src = "img/" (document.getElementById("img1").value).slice(12);}</script>
   


        
    </div>
</body>
</html>
