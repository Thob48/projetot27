<?php 
#conexao do banco de dados
include('conectadb.php');
// carrega pagina com produos ativos
#coleta de variaveis dos capos de texto HTML
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $id=$_POST['id'];
    $nome=$_POST['nome'];
    $drescicao=$_POST['descricao'];
    $quantidade=$_POST['quantidade'];
    $preco=$_POST['preco'];
    $ativo=$_POST['ativo'];
    $sql="UPDATE produtos SET pro_nome='$nome',pro_drescricao='$descricao',pro_quantidade='$quantidade,pro_preco = '$preco',pro_ativo='$ativo'  WHERE pro_id=$id";
    mysqli_query($link,$sql);
   
    header("Location:listaprodutos.php");
    echo"<script>window.alert('produto ALTERNADO COM SUCESSO! ');</script>";

}
// $id=$_GET['id'];
// $sql="SELECT * FROM produtos WHERE pro_id='$id'";
// $resultado= mysqli_fetch_array($link,$sql);


$id = $_GET['id'];
$sql ="SELECT * FROM produtos WHERE pro_id='$id'";
$resultado=mysqli_query($link,$sql);
while ($tbl=mysqli_fetch_array($resultado)) {
     $nome = $tbl[1];
    $descricao = $tbl[2];
    $quantidade = $tbl[4];
    $preco = $tbl[3];
    $ativo = $tbl[5];

}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="newestilo.css">
    <title>alteraproduto</title>
</head>
<body>
<a href="homesistema.html"><input type="button" id="menuhome" value="HOME SISTEMA"></a>
    <div>
        <form action="ateraproduto.php" method="post">
            <input type="hidden" name="id" value="<?=$id?>">
            <label>NOME</label>
            <input type="text" name="nome",value=",<?=$nome?>"required>
            <label>DESCRIÇÃO</label>
            <input type="text" name="descricao",value=",<?=$descricao?>"required>
            <label>QUANTIDADE</label>
            <input type="number" name="quantidade",value=",<?=$quantidade?>"required>
            <label>PRECO</label>
            <input type="number" name="preco",value=",<?=$preco?>"required>
            <br></br>
            <label>Status: <?=$check = ($ativo == 's')?"ATIVO":"INATIVO";?></label><br>
            <!-- onclick submit() é um um javascript que ja faz o submit na pagin usando o navegador -->
        <input type="radio" name="ativo" value="s" required onclick="submit()"<?=$ativo == "s"? "checked":""?>>ATIVO<br>
        <input type="radio" name="ativo" value="n" required onclick="submit()"<?=$ativo == "n"? "checked":""?>>INATIVO

        <input type="submit" value="SALVAR">
            
    </div>
    
</body>
</html>