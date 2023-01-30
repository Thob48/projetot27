<?php 
include('conectadb.php');
if ($_SERVER('REQUEST_METHOD')=='POST') {
    $id=$_POST['id'];
    $nome=$_POST['nome'];
    $senha=$_POST['senha'];
    $sql="UPDATE usuarios SET usu_senha='$senha',usu_nome='$nome'WHERE usu_id=$id";
    mysqli_query($link,$sql);
    header("Location:listausuario.php");
    echo"<scrip>alert('USUARIO ALTERNADO COM SUCESSO! ');</script>";
    exit();
    # code...
}

$id = $_GET['id']
$sql ="SELECT * FROM usuarios WHERE usu_id=$id";
$resultado=mysqli_query($link,$sql);
while () {
    # code...
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="alterausuario.php" method="post">
         <input type="hidden" value="<?=id?>" name="id">
         <label>NOME</label>
         <input type="text" name="nome" id="nome" value=<?$nome?>>
         <label>SENHA</label>  
         <input type="text" name="nome" id="nome" value=<?$nome?>> 
</body>
</html>