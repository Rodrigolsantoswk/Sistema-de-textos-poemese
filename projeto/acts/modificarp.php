<?php
include "../conexao.php";

$idtexto= $_POST['idtexto'];
$iduser= $_POST['idusuario'];
$pare= $_POST['pare'];

$query= "select * from userart where idArt= {$idtexto}";
$result= mysqli_query($conexao, $query) or die(mysqli_error());
$cont=0;

while ($rows= mysqli_fetch_assoc($result)){
	if($pare==$rows['idUser']){
		$cont=$pare;
	}
}


if($cont<>0){
	header("location: ../recotxt.php?msg=2");
}else{
	$query2= "update userart set idUser= {$pare} where idArt={$idtexto} and idUser={$iduser}";
	$result2= mysqli_query($conexao, $query2) or die(mysqli_error());

	header("location: ../recotxt.php?msg=3");
}
?>