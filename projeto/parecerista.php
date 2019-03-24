<?php
include "conexao.php";
session_start();

if(!isset($_SESSION['usuario'])){
	header("location: paglog.php");
	session_destroy();
}

$query= "SELECT * FROM `user` WHERE Email= '{$_SESSION['usuario']}'";
$result= mysqli_query($conexao, $query) or die(mysqli_error());

while($registro = mysqli_fetch_array($result)){
$_Sessao=$registro['nameUser'];
$idUsuario= $registro['idUser'];
$_Mail= $registro['Level'];
}

$query= "SELECT article.idArticle, article.Title, article.Text, article.Author, article.Email, article.status, user.idUser FROM `userart`
	join article on article.idArticle= userart.idArt 
	join user on user.idUser= userart.idUser
	where user.idUser={$idUsuario}";

$result= mysqli_query($conexao, $query) or die(mysqli_error());

if (isset($_GET['deslogar'])){
	session_destroy();
	header("location: index.html");
}

//CONTROLE DE ERROS
if(isset($_GET['msg'])){
    $msg=$_GET['msg'];
    switch($msg){
        case 1:
        ?>
        <div id="erro" class="alert alert-danger" role="alert">
            <p align="center">Não deixe campos em branco!</p>
        </div>
        <?php
        break;
        case 2:
        ?>
        <div id="erro" class="alert alert-success" role="alert">
            <p align="center">Parecer enviado com sucesso</p>
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
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="shortcut icon" type="image/png" href="imgs/fav.png"/>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<title>Parecerista</title>
</head>
<style>
.modal-body{
	font-size:11pt;
	font-weight: lighter;
}
textarea#comentarios{
	border-radius: 8px;
	resize: none;
}
.container {
	display: block;
	position: relative;
	padding-left: 35px;
	margin-bottom: 12px;
	cursor: pointer;
	font-size: 18px;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
}

.container input {
	position: absolute;
	opacity: 0;
	cursor: pointer;
}

.checkmark {
	position: absolute;
	top: 0;
	left: 0;
	height: 25px;
	width: 25px;
	background-color: #eee;
	border-radius: 50%;
}

.container:hover input ~ .checkmark {
	background-color: #ccc;
}

.container input:checked ~ .checkmark {
	background-color: #2196F3;
}

.checkmark:after {
	content: "";
	position: absolute;
	display: none;
}

.container input:checked ~ .checkmark:after {
	display: block;
}

.container .checkmark:after {
	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}
</style>

<script>
  //CONTROLE DE ERROS--TEMPO
	setTimeout(function() {
   		$('#erro').fadeOut('linear');
	}, 2000);
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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
</header>
<div class="container theme-showcase" role="manin">
		<div class="page-header">
			<h1 align="center">Lista de textos pendentes</h1>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thread>
						<tr>
							<th>#</th>
							<th>Titulo</th>
							<th>Autor</th>
							<th>Email</th>
							<th>Status</th>
							<th></th>
							<th>Opções</th>
						</tr>
					</thread>
					<tbody>
					<?php while($rows= mysqli_fetch_assoc($result)) { ?>
					<tr>
					<td><?php echo $rows['idArticle']; ?></td>
					<td><?php echo $rows['Title']; ?></td>
					<td><?php echo $rows['Author']; ?></td>
					<td><?php echo $rows['Email']; ?></td>
					<td><?php echo $rows['status']; ?></td>
					<td></td>
					<td><button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $rows['idArticle']; ?>">Ver texto</button>

					<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $rows['idArticle']; ?>" data-whateveruser="<?php echo $rows['idUser']; ?>">Enviar parecer</button>

					</td>
					</tr>

<!-- Início Modal -->
	<div class="modal fade" id="myModal<?php echo $rows['idArticle']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
	   		 <div class="modal-content">
				   <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"><?php echo $rows['Title']; ?></h4>
				   </div>
				   <div class="modal-body" id="corpomodal">
					<?php echo $rows['Author']; ?>
					<br><br>
					<?php echo "<p>".$rows['Text']."</p>"; ?>
				  </div>
				<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
	    </div>
	</div>
</div>
<!-- Fim Modal -->
					<?php } ?>
				</tbody>
			</table>	
		</div>
	</div>
</div>

<!-- início modal enviar-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  				<h4 class="modal-title" id="exampleModalLabel">New message</h4>
  			</div>
  			<div class="modal-body">
  				<div class="espaco"></div>
  				<form method="post" action="acts/enviarparec.php" enctype="multipart/form-data">
  					<input type="hidden" name="idtexto" class="form-control" id="idtexto" readonly="true">
  					<input type="hidden" name="idUser" class="form-control" id="idUser" readonly="true">
  					<div class="form-group">
  						<br><br>
  						<label for="pare" class="control-label">Digite seus comentários: </label>
  						<br>
  						<textarea name="comentarios" id="comentarios" rows="20" cols="77"></textarea>
  						<br><br>

  						<label class="container">Aprovado
  						<input type="radio" name="parec" value="ap">
  						<span class="checkmark"></span>
  						</label>
  						<label class="container">Reprovado
  						<input type="radio" name="parec" value="rp">
  						<span class="checkmark"></span>
  						</label>
  						<input type="hidden" name="idparec" id="idparec">
  					</div>
  					<div class="modal-footer">
  						<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
  						<button type="submit" class="btn btn-primary">Enviar</button>
  					</div>
  				</form>
  			</div>
  		</div>
  	</div>
</div>
<!-- fim modal enviar-->

<footer id="adm">
  <ul id="menufooter">
    <li><a href="acts/mudarsenhaparec.php">Mudar Senha</a></li>
  </ul>

</footer>

 <!-- Importando o jQuery -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 
 <!-- Importando o js do bootstrap -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

 <script type="text/javascript">
 	$('#exampleModal').on('show.bs.modal', function (event) {
 		var button = $(event.relatedTarget) 
 		var recipient = button.data('whatever') 
 		var user= button.data('whateveruser')

 		var modal = $(this)
 		modal.find('.modal-title').text('Selecione o parecerista para o texto: ' + recipient)
 		modal.find('#idtexto').val(recipient)
 		modal.find('#idUser').val(user)

 	})
 </script>
</body>
</html>