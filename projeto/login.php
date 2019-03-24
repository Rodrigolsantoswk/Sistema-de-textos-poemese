<doctype! html>
<head>
	<meta charset="utf-8">
	<title>LOGIN</title>
</head>

<?php
include "conexao.php";

session_start();

if(empty($_POST['usuario']) || empty($_POST['senha'])){
	header("Location: paglog.php?msg=1");
	exit();
}

$email= mysqli_real_escape_string($conexao, $_POST["usuario"]);
$senha= mysqli_real_escape_string($conexao, $_POST["senha"]);

$query= "select * from user where Email='{$email}'";

$result= mysqli_query($conexao, $query) or die (mysqli_error());
$row= mysqli_num_rows($result);

while($registro = mysqli_fetch_array($result)){
	$level= $registro['Level'];
	$_SESSION["level"]=$level;
	$senharesult=$registro['Pass'];
}

$pass= password_verify($senha, $senharesult);

if(strcmp($level, "parecerista")){
	$_SESSION['pagina']="administrador.php"; 
}else if(strcmp($level, "admin")){
	$_SESSION['pagina']="parecerista.php"; 
}

if(password_verify($senha, $senharesult)){
	$_SESSION["usuario"]= $_POST["usuario"];
	$_SESSION["senha"] =$senharesult;
	header("location: painel.php");

} else{
	header("location: paglog.php?msg=2");
}

?>
<body>
	
</body>
</html>