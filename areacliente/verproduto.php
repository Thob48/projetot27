<?php
include("../conectadb.php");

#Busca a Variavel de Sesão do usuario
session_start();

if ($_SERVER['REQUESTD_METHOD']=='POST') {
    $idproduto=$_post['idproduto'];
    $nomeproduto=$_post['nomeproduto'];
    $descricao=$_post['descricao'];
    $quantidade=$_post['quantidade'];
    $totalparcial=($preco*$quantidade);

    #VARIAVEL CRIADA PARA INDENTIFICAÇAO DO CARRINHO

    $numerocarrinho=MD5($_SESSION('idcliente').date('Y').date('m').date('d').date('H').date('i').date('s'));
}

?>