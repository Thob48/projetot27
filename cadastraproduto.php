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

#variaveis para coletar informaçoes no banco de dados sql
$sql = "SELECT COUNT(pro_id) FROM produtos WHERE pro_nome = '$nome'";
$resultado = mysqli_query($link, $sql);

while ($tbl = mysqli_fetch_array($resultado)) {
    $cont = $tbl[0];
    if ($cont == 0) {
        $sql = "INSERT INTO produtos(pro_nome, pro_descricao, pro_quantidade, pro_preco, pro_ativo, imagem1) VALUES('$nome', '$descricao', '$quantidade', '$preco', 's', '$imagem_base64')";
        mysqli_query($link, $sql);
        header("Location: listaprodutos.php");
        exit();
        
    } else {
        echo "<script>window.alert('PRODUTO JÁ CADASTRADO!');</script>";
    }
}
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
    <form action="cadastraproduto.php" method="POST" enctype="multipart/form-data">
        <h1>CADASTRO DE produtos</h1>
        <input type="text" name="nome" id="nome" placeholder="NOME" required>
        <p></p>
        <input type="text" name="descricao" id="descricao" placeholder="DESCRIAÇÃO" required>
        <input type="text" name="quantidade" id="quantidade" placeholder="QUANTIDADE" required>
        <input type="text" name="preco" id="preco" placeholder="VALOR" required>
        <p></p>
        <input type="submit" name="cadastrar" id="cadastrar" value="CADASTRAR">
        <!-- BLOCO DE CÓDIGO NOVO -->
        <label>IMAGEM</label>
            <!-- <input type="file" name="foto1" id="img1" onchange="foto1()"> -->
            <input type="file" name="imagem" id="imagem">
            <br>
        
    </form>
   


        
    </div>
</body>
</html>
