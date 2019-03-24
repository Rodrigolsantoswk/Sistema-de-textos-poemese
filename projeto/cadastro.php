<?php 
if(isset($_GET['msg'])){
    $msg=$_GET['msg'];
    switch($msg){
        case 1:
        ?>
        <div class="alert alert-danger" role="alert">
            Preencha todos os campos. Tente novamente.
        </div>
        <?php
        break;
        case 2:
        ?>
        <div class="alert alert-danger" role="alert">
            Usuário já existe, tente outro email.
        </div>
        <?php
        break;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="author" content="Rodrigo Lima">
    <link rel="shortcut icon" type="image/png" href="imgs/fav.png"/>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
	<form action="cadastrar.php" id="formcadastro" name="formcadastro" method="post">
		<label>Nome completo:</label><input type="text" name="nome"><br><br>
		<label>Email:</label><input type="email" name="email"><br><br>
		<label>Senha:</label><input type="password" name="senha"><br><br>
		<input type="submit" value="Enviar" name="enviar">
	</form>
</body>
</html>