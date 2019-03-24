<?php
include "conexao.php";

$idtexto= $_POST['idtexto'];

$query= "Delete from userart where idArt = {$idtexto}";
$result= mysqli_query($conexao, $query) or die(mysqli_error());

$query2= "update article set status= 'pendente' where idArticle={$idtexto}";
$result2= mysqli_query($conexao, $query2) or die(mysqli_error());

$query3= "select *from avarticle where idArticle= {$idtexto}";
$result3= mysqli_query($conexao, $query3) or die(mysqli_error());
$rows= mysqli_num_rows($result3);

if($rows>0){
	$query4= "delete from avarticle where idArticle={$idtexto}";
	$result= mysqli_query($conexao, $query4) or die(mysqli_erro());
}

header("location: recotxt.php?msg=1");

?>