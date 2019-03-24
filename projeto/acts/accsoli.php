<?php 
include "../conexao.php";

$idSoli= $_POST['idSoli'];
$nameSoli= $_POST['nomeSoli'];
$mailSoli= $_POST['mailSoli'];
$passSoli= $_POST['passSoli'];

$query= "INSERT INTO `user`(`nameUser`, `Email`, `Pass`, `Level`) VALUES ('{$nameSoli}', '{$mailSoli}', '{$passSoli}', 'parecerista')";
$result= mysqli_query($conexao, $query) or die(mysqli_error());


$q="delete from solicitacoes where idSoli={$idSoli}";
$del= mysqli_query($conexao, $q) or die(mysqli_error());
header("location: ../solicitacoesadm.php?msg=1");

?>