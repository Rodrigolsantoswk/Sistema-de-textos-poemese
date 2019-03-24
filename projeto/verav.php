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
$_Mail=$registro['Level'];
}
/*----------------------------------*/

$idtexto= $_POST['idtexto'];

$query2="SELECT article.idArticle, article.Title, article.Text, article.Author, article.Email, article.status, avarticle.idavArticle, avarticle.comments, avarticle.idUser, avarticle.idArticle, avarticle.parecer, user.nameUser, user.Email from avarticle 
	join article
	on avarticle.idArticle = article.idArticle 
	join user 
	on avarticle.idUser= user.idUser 
	where article.idArticle={$idtexto}";
$resultq= mysqli_query($conexao, $query2) or die(mysqli_error());

/*-----------------------------------*/

$query1= "SELECT * FROM `user` WHERE Level='parecerista'";
$result1= mysqli_query($conexao, $query1) or die(mysqli_error());

if(strcmp($_Mail, "parecerista")==0){
	session_destroy();
	header("location: paglog.php?msg=4");
}

if (isset($_GET['deslogar'])){
	session_destroy();
	header("location: index.php");
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<title>Administrador</title>
</head>

<script>
  //CONTROLE DE ERROS--TEMPO
	setTimeout(function() {
   		$('#erro').fadeOut('linear');
	}, 2000);
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<style>

.comentarios{
	white-space: pre-line;
	hyphens: auto;
	background-color: white;
	font-family: arial, sans-serif;
	padding-right: 5px;
	text-align: justify;
	font-weight: 200;
}

.comentarios img{
	width: 350px;
}

input#titleart{
	border:none;
	font-size: 15pt;
	text-align: center;
	margin-bottom: 10px;
	background-color: white;
	border-bottom-style: solid;
	border-bottom-color: purple;
	border-bottom-width: 3px;
	padding:20px;
}
p#usuario, p#level{
	margin-left: 5px;
}
</style>

<body>
	<header class="adm">
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
				<li><a href="administrador.php">Textos Pendentes</a></li>
				<li><a href="solicitacoesadm.php">Solicitações</a></li>
				<li><a href="textap.php">Textos Aprovados</a></li>
				<li><a href="textrp.php">Textos Reprovados</a></li>
				<li><a href="textba.php">Textos Balanceados</a></li>
        		<li><a href="recotxt.php">Recolher textos</a></li>
			</ul>
		</nav>
	</header>
	<div class="container theme-showcase" role="manin">
		<div class="page-header">
			<h1 align="center">Lista de Pareceres</h1>
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
							<th>Parecerista</th>
							<th>Parecer</th>
							<th>Visualizar</th>
						</tr>
					</thread>
					<tbody>
					<?php 
					while($rows= mysqli_fetch_assoc($resultq)) { ?>
					<tr>
					<td><?php echo $rows['idArticle']; ?></td>
					<td><?php echo $rows['Title']; ?></td>
					<td><?php echo $rows['Author']; ?></td>
					<td><?php echo $rows['Email']; ?></td>
					<td><?php echo $rows['nameUser']; ?></td>
					<td><?php 
					if(strcmp($rows['parecer'], "ap")==0){
						echo "Aprovado";
					}else{
						echo "Reprovado"; 
					}  ?></td>
					<td>
					<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $rows['idArticle']; ?>" data-whatevertitulo="<?php echo $rows['Title']; ?>" data-whatevercoments="<?php echo $rows['comments']; ?>">Ver texto</button>

					</td>
					</tr>
		
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
  					<input type="text" name="titleart" class="form-control" id="titleart" readonly="true">
  					<p name="coments" class="comentarios" id="coments">Comentarios</p>
  					<div class="modal-footer">
  						<button type="button" class="btn btn-info" data-dismiss="modal">Fechar</button>
  					</div>

  			</div>
  		</div>
  	</div>
  </div>
<!-- fim modal enviar-->



  <!-- Importando o jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
  <!-- Importando o js do bootstrap -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script type="text/javascript">
  $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var recipient = button.data('whatever') 
  var title= button.data('whatevertitulo');	
  var comments= button.data('whatevercoments');

  var modal = $(this)
  modal.find('.modal-title').text('Parecer referente ao texto: ' + recipient)
  modal.find('#idtexto').val('' + recipient)
  modal.find('#titleart').val('' + title)
  modal.find('.comentarios').text('' + comments)


  })


  </script>

</body>
</html>