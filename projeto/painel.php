<doctype! html>
<head>
	<meta charset="utf-8">
	<title>painel</title>
</head>

<?php
include "conexao.php";

session_start();
if(!isset($_SESSION['usuario']) and !isset($_SESSION['senha'])){

	header("location: paglog.php");
	exit;
}else{
	/*
	if(strcmp($_SESSION['level'], "admin")==0){
		header("location: administrador.php");
	}else if(strcmp($_SESSION['level'], "admin")==0){
		header("location: administrador.php");
	}
	echo "<center>autenticado</center>";
	*/
	header("location: ".$_SESSION['pagina']);
}

?>

<body>
<h1><a href="sair.php"><center>SAIR</center></a></h1>

</body>
</html>