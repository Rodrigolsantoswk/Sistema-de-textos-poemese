<?php 
include "../conexao.php";

if(empty($_POST['comentarios']) || empty($_POST['parec'] || empty($_POST['idparec'] || empty($_POST['idtexto'])))){
	header("Location: ../parecerista.php?msg=1");
	exit();
}

$coment= mysqli_real_escape_string($conexao, $_POST['comentarios']);
$parec= mysqli_real_escape_string($conexao,$_POST['parec']);
$idparec= $_POST['idUser'];
$idtexto= mysqli_real_escape_string($conexao,$_POST['idtexto']);

$query= "INSERT INTO `avarticle`(`comments`, `idUser`, `idArticle`, `parecer`) VALUES ('{$coment}', {$idparec}, {$idtexto}, '{$parec}')";
$result= mysqli_query($conexao, $query) or die(mysqli_error());

$query2="delete from userart where idArt = {$idtexto} and idUser= {$idparec}";
$result2= mysqli_query($conexao, $query2) or die(mysqli_error());

$query3= "select * from avarticle where idArticle={$idtexto}";
$result3= mysqli_query($conexao, $query3) or die(mysqli_error());
$rows= mysqli_num_rows($result3);

$contrp=0;
$contap=0;
$query4="";
if($rows==2){
	while($registro= mysqli_fetch_assoc($result3)){
		$parec= $registro['parecer'];
		if(strcmp($parec, "ap")==0){
			$contap++;
		}else{
			$contrp++;
		}
	}
	if($contap==2){
		$query4= "update article set status='aprovado' where idArticle={$idtexto}"; 
		$result4= mysqli_query($conexao, $query4) or die(mysqli_error());
			echo "aprovado";
	}else if($contrp==2){
		$query4= "update article set status='reprovado' where idArticle={$idtexto}";
		echo "reprovado";
		$result4= mysqli_query($conexao, $query4) or die(mysqli_error());
	}else if($contrp==1 && $contrp==1){
		$query4= "update article set status='incerto' where idArticle={$idtexto}";
		$result4= mysqli_query($conexao, $query4) or die(mysqli_error());
		echo "incerto";
	}
}


header("location: ../parecerista.php?msg=2");

?>