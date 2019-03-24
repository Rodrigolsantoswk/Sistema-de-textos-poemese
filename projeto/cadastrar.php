<?php
include "conexao.php";

$nome= $_POST['nome'];
$email= $_POST['email'];
$senha= $_POST['senha'];

$query="select Email from user where email='{$email}'";
$result= mysqli_query($conexao, $query) or die(mysqli_erro($conexao));
$row=mysqli_num_rows($result);

if($nome=="" || $email=="" || $senha==""){
	header("location: cadastro.php?msg=1");
	exit();
}else if($row==1){
	header("location: cadastro.php?msg=2");
	exit();
}

$pass= password_hash($senha, PASSWORD_DEFAULT);


echo "$nome, $email, $senha", $pass;
$query="insert into user (nameUser, Email, Pass, Level) VALUES ('{$nome}', '{$email}', '{$pass}', 'parecerista')";
$result= mysqli_query($conexao, $query) or die (mysqli_error($conexao));
?>