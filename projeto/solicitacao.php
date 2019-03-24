<?php
include "conexao.php";


$nome= $_POST['nome'];
$email= $_POST['email'];
$senha= $_POST['senha'];

$query="select Email from user where email='{$email}'";
$result= mysqli_query($conexao, $query) or die(mysqli_erro($conexao));
$row=mysqli_num_rows($result);

$query2="select Email from user where email='{$email}'";
$result2= mysqli_query($conexao, $query2) or die(mysqli_erro($conexao));
$row2=mysqli_num_rows($result2);

if($nome=="" || $email=="" || $senha==""){
	header("location: solicitar.php?msg=1");
	exit();
}else if($row==1){
	header("location: solicitar.php?msg=2");
	exit();
}else if($row2==1){
	header("location: solicitar.php?msg=3");
	exit();
}

$pass= password_hash($senha, PASSWORD_DEFAULT);

$query= "insert into solicitacoes (nameSoli, mail, PassSoli) values ('{$nome}', '{$email}', '{$pass}')";

$result= mysqli_query($conexao, $query) or die (mysqli_error($conexao));
header("location: solicitar.php?msg=4");

?>