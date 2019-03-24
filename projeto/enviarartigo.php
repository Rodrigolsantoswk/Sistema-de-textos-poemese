<?php 
include "conexao.php";

$titulo= $_POST['titulo'];
$artigo= $_POST['artigo'];
$autor= $_POST['autor'];
$email= $_POST['email'];

if($titulo=="" || $artigo=="" || $autor=="" || $email==""){
	header("location: envioartigo.php?msg=1");
	exit();
}

$query="insert into article (Title, Text, Author, Email) VALUES ('{$titulo}', '{$artigo}', '{$autor}', '{$email}')";
$result= mysqli_query($conexao, $query) or die (mysqli_error($conexao));
header("location: envioartigo.php?msg=2");
?>