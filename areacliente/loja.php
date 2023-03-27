<?php
#Traz arquivo de conexão do banco
include("../conectadb.php");

session_start();

#Carrega a Página trazendo produtos com s (Produtos ATIVOS)
$sql = "SELECT * FROM produtos WHERE pro_ativo = 's'";
$resultado = mysqli_query($link, $sql);
#Atribui s para variavel ativo
$ativo = "s";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="newestiloloja.css">
    <title>LOJA DO PROJETO</title>
</head>
<body>
    <?php
    if (isset($_SESSION['idcliente'])){
?>
 <h1 style="background-color: withesmoke;">BOM DIA <?=$_SESSION['nomecliente'];?></h1>
 <form id="formloja" action="logout.php" method="post">
   
 <a href="carrinho.php"><input type ="button" value="AREA CLIENTE"<?=$_SESSION['idcliente']?>></a>
 <input type="submit" value="LOGOUT"> 
</form>
    
<?php
    }
    else {
    ?>
    <form id="formloja" action="logout.php" method="post">
        <a href="logincliente.php"><input type="button" value="LOGIN"></a>
        <a href="clientecadastra.php"><input type="button" value="CRIAR LOGIN"></a>
    </form>
    <?php
    }
    ?>
    <!-- coleta nome do usuario na variavel sessão -->
   
    
    <form action="loja.php" method="post">
    <link rel="stylesheet" href="newestiloloja.css">
    <div class="container">
        <table border="1">
            <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>DESCRIÇÃO</th>
                    <th>PRECO</th>
                    <th>IMAGEM</th>
                    <th>VER PRODUTO</th>
            </tr>
            <?php
                #Preenchimento da tabela com os dados do banco
                while($tbl = mysqli_fetch_array($resultado)){
                    ?>
                    <tr>
                        <td><?= $tbl[0]?></td>
                        <td><?= $tbl[1]?></td>
                        <td><?= $tbl[2]?></td>
                        <!-- linha abaixo converte formato da $tbl[3] usando 2 casas após a virgula e aplicando , ao lugar de ponto -->
                        <td>R$ <?= number_format($tbl[4],2,',','.')?></td>
                        <td><img src="data:image/jpeg;base64,<?=$tbl[6]?>" width="100" height="100"></td>
                        <td><a href="verproduto.php?id=<?= $tbl[0]?>"><input type="button" value="VER PRODUTO"></a></td>
                    </tr>
                    <?php
                }
                ?>
        </table>
            
    </div>
    </form>
</body>
</html>