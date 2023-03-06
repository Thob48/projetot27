<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA PRODUTOS</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <a href="homesistema.html"><input type="button" name="voltahomesistema" value="HOME SISTEMA"></a>
    <div>
        <table border="1">
        <?php
#abre conexao para o banco de dados
include("conectadb.php");

$sql="SELECT* FROM produtos Where pro_ativo='s'";
$resultado=mysqli_query($link,$sql);
$ativo="s";


#passa a instruçao para o bando de dados
#funçao da instruçao: LISTAR TODOS O CONTEUDO DA TABELA usuarios
// $sql = "SELECT * FROM produtos";
// $resultado = mysqli_query($link, $sql);
// $ativo=$_POST['ativo'];
// if ($ativo=='s') {$ativo=$_POST==[]
    # code...
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja</title>
    <link rel="stylesheet" href="newestilo.css">

</head>

<body>
    
    <form action="loja.php" method="post">
       
    </form>
    <div class="container">
        <table border="1">
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>DESCRIÇAO</th>
                <th>QUANTIDADE</th>
                <th>PRECO</th>
                <th>IMAGEM</th>
                <th>ADICIONAR AO CARRINHO</th>
            </tr>
            <?php
                while ($tbl = mysqli_fetch_array($resultado)){
                    ?>
                    <tr>
                        <td><?= $tbl[0]?></td>
                        <td><?= $tbl[1]?></td>
                        <td><?= $tbl[2]?></td>
                        <td><input type="number" name="quantidade"></td>
                        <td>R$<?=str_replace('.',','); $tbl[3]?></td>
                        <td><img src="img/"<?=tbl[6]?>width="100"></td>
                        <td><?= $tbl[4]?></td>
                        <td><a href="addproduto.php?id=<?= $tbl[0]?>"><input type="button" value="ALTERAR"></a></td>

                    </tr>
                    <?php
                }
            ?>
        </table>
    </div>
</body>

</html>
</table>
</div>
</body>
</html>