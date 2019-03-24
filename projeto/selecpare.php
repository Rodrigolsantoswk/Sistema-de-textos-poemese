<?php 
session_start();

include "conexao.php";

$idtexto= $_POST['idtexto'];
$parecerista1= $_POST['pare'];
$parecerista2= $_POST['pare2'];

if(strcmp($parecerista1, $parecerista2)==0){
	header("location: administrador.php?msg=1");
	exit();
}else{


$query="INSERT INTO `userart`(`idUser`, `idArt`) VALUES ({$parecerista1},{$idtexto})";
$query2="INSERT INTO `userart`(`idUser`, `idArt`) VALUES ({$parecerista2},{$idtexto})";

$result= mysqli_query($conexao, $query) or die(mysqli_error());

$result2= mysqli_query($conexao, $query2) or die(mysqli_error());

$query3="UPDATE `article` SET `status` = 'aguardandoparecer' WHERE `article`.`idArticle` = {$idtexto}";

$result3= mysqli_query($conexao, $query3) or die(mysqli_error());

header("location: administrador.php?msg=2");
}
?>