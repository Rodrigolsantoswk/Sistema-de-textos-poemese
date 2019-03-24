<?php 
include "../conexao.php";

$idSoli= $_POST['idSoli'];

$query= "delete from solicitacoes where idSoli='{$idSoli}'";

$result= mysqli_query($conexao, $query) or die(mysqli_error());

header("location: ../solicitacoesadm.php");
?>