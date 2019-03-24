<?php 
include "../conexao.php";

$idtexto= $_POST['idtexto'];

$query= "delete from article where idArticle='{$idtexto}'";

$result= mysqli_query($conexao, $query) or die(mysqli_error());

header("location: ../administrador.php");
?>