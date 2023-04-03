<?php
include("../conectdb.php");
session_start();
if ($_SERVER['REQUEST_METHOD']=='GET') {
$id=$_POST['id'];
$sql="DELETE FROM itens_carrinho Where carrinho_id=$id";
mysqli_query($link,$sql);
echo"<script>window.alert('produto deletado com sucesso!);<script>";
echo"<script>window.locantion.href='carrinho.php';</script>";
}
$id=$_GET['id'];
$sql="SELECT pro_nome FROM itens_carrinho
INNER JOIN produtos ON fk_pro_id=pro_id
WHERE carrinho_id=$id";
$resultado=mysqli_query($link,$sql);
?>
