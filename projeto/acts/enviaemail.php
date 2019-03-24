<?php
include "../conexao.php";

$idtexto= $_POST['idtexto'];

$query= "select * from article where idArticle={$idtexto}";
$result= mysqli_query($conexao, $query) or die(mysqli_error());

while($registro = mysqli_fetch_array($result)){
	$autor= $registro['Author'];
	$status= $registro['status'];
}

if(strcmp($status, "aprovado")==0){
	$mensagem="Olá $autor, Seu texto foi aprovado, aguarde a publicação.
	\n 
	\n
	\n
	\n
	<strong>Equipe Poeme-se</strong>
	\n IFBA- Camaçari";
}else if(strcmp($status, "reprovado")==0){
	$mensagem="Olá $autor, Infelizmente, seu texto foi reprovado, tente novamente!
	\n 
	\n
	\n
	\n
	<strong>Equipe Poeme-se</strong>
	\n IFBA- Camaçari";
}

$query= "select Email from article where idArticle={$idtexto}";
$result= mysqli_query($conexao, $query) or die(mysqli_error());

while($registro = mysqli_fetch_array($result)){
	$email= $registro['Email'];
}


$to= $email;
$subject= "Parecer Poeme-se";
$message= $mensagem;
$header= "MIME-Version: 1.0\n";
$header= "Content-type: text/html; charset=iso-8859-1\n";
$header= "From: $email\n";

mail($to, $subject, $message, $header);

header("../administrador.php?msg=3"); 
?>