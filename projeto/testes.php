<?php
include "conexao.php";

$query3= "select * from user where Level= 'parecerista' ";
$result3= mysqli_query($conexao, $query3) or die(mysqli_error());
while($rows1= mysqli_fetch_assoc($result3)) {
	echo $rows1['idUser'];
}
?>