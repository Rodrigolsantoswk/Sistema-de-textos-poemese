<?php
include "../conexao.php";
session_start();

if(!isset($_SESSION['usuario'])){
	header("location: paglog.php");
	session_destroy();
}

$query= "SELECT * FROM `user` WHERE Email= '{$_SESSION['usuario']}'";
$result= mysqli_query($conexao, $query) or die(mysqli_error());

while($registro = mysqli_fetch_array($result)){
$_Sessao=$registro['nameUser'];
$_SESSION['Email']= $registro['Email'];
$_Mail=$registro['Level'];
}

if(strcmp($_Mail, "admin")==0){
	session_destroy();
	header("location: paglog.php?msg=4");
}

if (isset($_GET['deslogar'])){
	session_destroy();
	header("location: ../index.html");
}

//CONTROLE DE ERROS
if(isset($_GET['msg'])){
    $msg=$_GET['msg'];
    switch($msg){
        case 1:
        ?>
        <div id="erro" class="alert alert-danger" role="alert">
            <p align="center">Digite as novas senhas iguais</p>
        </div>
        <?php
        break;
        case 2:
        ?>
        <div id="erro" class="alert alert-danger" role="alert">
            <p align="center">A senha antiga não corresponde a senha da conta</p>
        </div>
      
        <?php
        break;
        case 3:
        ?>
        <div id="erro" class="alert alert-warning" role="alert">
            <p align="center">Digite todos os dados necessários</p>
        </div>
      
        <?php
        break;
        case 4:
        ?>
        <div id="erro" class="alert alert-success" role="alert">
            <p align="center">Senha alterada com sucesso</p>
        </div>
      
        <?php
        break;
    }
}
//FIM CONTROLE DE ERROS

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="author" content="Rodrigo Lima">
  <link rel="shortcut icon" type="image/png" href="imgs/fav.png"/>
  <link rel="stylesheet" type="text/css" href="../css/estilo.css">
  <link rel="stylesheet" type="text/css" href="../css/login.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <title>Parecerista</title>
</head>

<script>
  //CONTROLE DE ERROS--TEMPO
  setTimeout(function() {
      $('#erro').fadeOut('linear');
  }, 2000);
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<style>
	section.adm{
		display:flex;
		justify-content: center;
		margin: 100px;
		font-family: arial, sans-serif;
	}
	form button{
		margin-left: 170px;
	}
</style>

<body>
  <header class="adm">
    <span id="deslogar"><a href="?deslogar">Sair</a></span>
    <p id="usuario"> Usuário: 
      <?php
      echo $_Sessao;
      ?>
    </p>
    <p id="level"> Level: 
      <?php
      echo $_Mail;
      ?>
    </p>
    <nav class="adm">
      <ul id="menuadm">
        <li><a href="../parecerista.php">Textos Pendentes</a></li>
      </ul>
    </nav>
  </header>

  <section class="adm">
  	
  		<form action="mudasenhaparec.php" method="post">
  			<label for="senhaantiga" class="control-label">Digite sua senha antiga:</label>
			&nbsp;
			<input type="password" id="senhaantiga" name="senhaantiga" placeholder="********">
			<br><br>
			<label for="novasenha" class="control-label">Digite a nova senha:</label>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="password" id="novasenha" name="novasenha" placeholder="********">
			<br><br>
			<label for="novasenha" class="control-label">Confirme a nova senha:</label>
			&nbsp;
			<input type="password" id="novasenha2" name="novasenha2" placeholder="********">
			<br><br>
			<button type="submit" class="btn btn-info">Cadastrar</button>
		</form> 
  </section>

  <footer id="adm">
  <ul id="menufooter">
    <li><a href="mudarsenha.php">Mudar Senha</a></li>
  </ul>

</footer>
</body>
</html>