<?php 
include "../conexao.php";

if(!isset($_POST['idtexto'])){
	header("administrador.php?msg=4");
}else{

$idtexto= $_POST['idtexto'];

$query= "update article set status= 'aprovado' where idArticle={$idtexto}";
$result= mysqli_query($conexao, $query) or die(mysqli_error());

header("location: ../textba.php?msg=1");
}
?>