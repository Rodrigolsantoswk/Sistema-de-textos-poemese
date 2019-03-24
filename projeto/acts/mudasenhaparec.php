<?php
session_start();
include "../conexao.php";

if(!isset($_POST['senhaantiga']) || !isset($_POST['novasenha']) || !isset($_POST['novasenha2'])){
	header("location: mudarsenhaparec.php?msg=3");
	exit();
}

$senhaantiga= mysqli_real_escape_string($conexao, $_POST['senhaantiga']);
$novasenha= mysqli_real_escape_string($conexao, $_POST['novasenha']);
$novasenha2= mysqli_real_escape_string($conexao, $_POST['novasenha2']);
$usuario= $_SESSION['Email'];

echo "$usuario, $senhaantiga, $novasenha2, $novasenha<br>";
$query= "select Pass from user where Email= '{$usuario}'";

if(strcmp($novasenha, $novasenha2)==0){
	echo "novas senhas iguais <br>";
	$result= mysqli_query($conexao, $query) or die(mysqli_error());
	$cont=0;

	while($rows = mysqli_fetch_array($result)){
		$senha= $rows['Pass'];


		if(password_verify($senhaantiga, $senha)){
			$cont++;
		}else{
			header("location: mudarsenhaparec.php?msg=2");
		}
	}
}else{
		header("location: mudarsenhaparec.php?msg=1");	
}

if($cont>0){
	$pass= password_hash($novasenha, PASSWORD_DEFAULT);
	$query2= "update user set Pass='{$pass}' where Email='{$usuario}'";
	$result2= mysqli_query($conexao, $query2) or die(mysqli_error());
	header("location: mudarsenhaparec.php?msg=4");
}
?>