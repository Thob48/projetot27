<?php
 include("conectadb.php");
#Coleta as variáveis do name do html e abre a conexão com Banco
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST['nome'];
    $descricao=$_POST['descricao'];
    $quantidade=$_POST['quantidade'];
    $preco=$_POST['preco'];
    //criptografa a foto para o banco de dados
if (isset($_FILES['imagem']) && $_FILES['imagem']['error']===UPLOAD_ERR_OK) {
    $imagem_temp = $_FILES['imagem']['tmp_name'];
    $imagem= file_get_contents($imagem_temp);
    $imagem_base64 = base64_encode($imagem);
    
}

    // $foto2=$_POST["foto2"];
   // if ($foto1=="")$img="semfoto.png";
   // $sql="SELECT COUNT (pro_id) FROM produtos WHERE pro_nome='$nome'";
   
#variaveis para coletar informaçoes no banco de dados sql
    $sql="SELECT COUNT(pro_id) from produtos WHERE pro_nome = '$nome'";
    $resultado = mysqli_query($link,$sql);
    while($tbl = mysqli_fetch_array($resultado)){
        $cont = $tbl[0]; 
    #Verificação visual se produto já existe no banco de dados ou não.
    if($cont==0){
        $sql = "INSERT INTO produtos (pro_nome, pro_descricao,pro_quantidade,pro_preco,pro_ativo,imagem1) VALUES('$nome', '$descricao','$quantidade',' $preco','s','$imagem_base64')";
        mysqli_query($link, $sql);
        echo($cont);
        header("Location: listaprodutos.php");
        exit();
    }
    // mostra o alerta se o produto com as memsas informaçoes ja existe no banco de dados
    else{
        echo "<script>window.alert('PRODUTO JÁ CADASTRADO!');</script>";
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
    <form action="cadastraproduto.php" method="POST" enctype="multipart/for-data">
        <h1>CADASTRO DE produtos</h1>
        <input type="text" name="nome" id="nome" placeholder="NOME" required>
        <p></p>
        <input type="text" name="descricao" id="descricao" placeholder="DESCRIAÇÃO" required>
        <input type="text" name="quantidade" id="quantidade" placeholder="QUANTIDADE" required>
        <input type="text" name="preco" id="preco" placeholder="VALOR" required>
        <p></p>
        <input type="submit" name="cadastrar" id="cadastrar" value="CADASTRAR">
        <label>Imagem</label><input type="file" name="imagem" id="img1">
        
    </form>
    <script>function foto1(){document.getElementById("foto1a").src = "img/" (document.getElementById("img1").value).slice(12);}</script>
   


        
    </div>
</body>
</html>
