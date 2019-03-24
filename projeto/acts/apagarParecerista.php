<?php 
include "../conexao.php";

$iduser= $_POST['iduser'];

$query= "delete from user where idUser='{$iduser}'";

$result= mysqli_query($conexao, $query) or die(mysqli_error());

header("location: gerenciarPareceristas.php?msg=1");

?>