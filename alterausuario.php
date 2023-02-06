<?php 
#conexao do banco de dados
include('conectadb.php');

#coleta de variaveis dos capos de texto HTML
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $id=$_POST['id'];
    $nome=$_POST['nome'];
    $senha=$_POST['senha'];
    $ativo=$_POST['ativo'];
    #Instruçao sql para atualizaçao de usuario e senha
    $sql="UPDATE usuarios SET usu_senha='$senha',usu_nome='$nome',usu_ativo='ativo'  WHERE usu_id=$id";
    mysqli_query($link,$sql);
   
    header("Location:listausuario.php");
    echo"<script>window.alert('USUARIO ALTERNADO COM SUCESSO! ');</script>";
    exit();
}

#colentando id link exemplo alteusuario.php?id=2
$id = $_GET['id'];
$sql ="SELECT * FROM usuarios WHERE usu_id='$id'";
$resultado=mysqli_query($link,$sql);
while ($tbl=mysqli_fetch_array($resultado)) {
    $nome=$tbl[1];
    $senha=$tbl[2];
    $ativo=$tbl[3];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Altera Usuario</title>
</head>
<!-- <body>
    <div>
        <form action="alterausuario.php" method="post">
         <input type="hidden" value="" name="id">
         <label>NOME</label>
         <input type="text" name="nome" id="nome" value=""required>
         <label>SENHA</label>  
         <input type="password" name="senha" id="senha" value=""required> 
         <input type="submit" value="SALVAR">
</form>
</div>
</body> -->
<body>
    <div>
        <form action="alterausuario.php" method="post">
        <input type="hidden" name="id" value="<?=$id?>" >
        <label>NOME</label>
        <input type="text" name="nome" value="<?=$nome?>" required>
        <label>SENHA</label>
        <input type="password" name="senha" value="<?=$senha?>" required>
        <br></br>
        <label>Status: <?=$check=($ativo=='s')?"ATIVO":"INATIVO";?></label>
        <br></br>
        <input type ="radio" name="ativo" value="s">ATIVAR<br>
        <input type ="radio" name="ativo" value="n">DESTIVAR
        <input type="submit" value="SALVAR">
        </form>
    </div>
</body>
</html>