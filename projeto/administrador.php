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

$query= "select*from article where status='pendente'";
$result= mysqli_query($conexao, $query) or die(mysqli_error());

$query1= "SELECT * FROM `user` WHERE Level='parecerista'";
$result1= mysqli_query($conexao, $query1) or die(mysqli_error());
$query2= "SELECT * FROM `user` WHERE Level='parecerista'";
$result2= mysqli_query($conexao, $query1) or die(mysqli_error());


if(strcmp($_Mail, "parecerista")==0){
	session_destroy();
	header("location: paglog.php?msg=4");
}

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
            <p align="center">Escolha pareceristas diferentes</p>
        </div>
        <?php
        break;
        case 2:
        ?>
        <div id="erro" class="alert alert-success" role="alert">
            <p align="center">Texto enviado com sucesso</p>
        </div>
      
        <?php
        break;
        case 3:
        ?>
        <div id="erro" class="alert alert-success" role="alert">
            <p align="center">Email enviado com sucesso</p>
        </div>
      
        <?php
        break;
        case 4:
        ?>
        <div id="erro" class="alert alert-danger" role="alert">
            <p align="center">Não entre nesta página diretamente!</p>
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


</style>

<body>
<div class="contentadm">
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
							<th>Visualizar</th>
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
					<td><button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $rows['idArticle']; ?>">Ver texto</button>

					<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $rows['idArticle']; ?>">Enviar</button>

					<button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#exampleModal2" data-whatever="<?php echo $rows['idArticle']; ?>">Apagar</button>

					</td>
					</tr>

								<!-- Início Modal -->
	<div class="modal fade" id="myModal<?php echo $rows['idArticle']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
	   		 <div class="modal-content">
				   <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 style="text-align:center;
          border-bottom-style: solid;
          border-radius: 10px; border-bottom-color:purple;" class="modal-title" id="myModalLabel"><?php echo $rows['Title']; ?></h4>
				   </div>
				   <div class="modal-body" id="corpomodal">
					<?php echo $rows['Author']; ?>
					<br><br>
					<?php echo "<p>".$rows['Text']."</p>"; ?>
				  </div>
				<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
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
  				<form method="post" action="selecpare.php" enctype="multipart/form-data">
  						<label for="recipient-name" class="control-label">Id do texto: </label>
  						<input type="text" name="idtexto" class="form-control" id="idtexto" readonly="true">
  					<div class="form-group">
  						<label for="pare" class="control-label"><br>Selecione o parecerista: <br><br> </label>

  						<!--SELECTS-->

              <div id="mainselection">
  						<select name="pare">
  							<?php while($rows1= mysqli_fetch_assoc($result1)) { ?>
  							<option value=" <?php echo $rows1['idUser']; ?> "> <?php echo $rows1['nameUser']; ?> </option>
  							<?php } ?>
  						</select>
              </div>
              <br>
              <div id="mainselection">
  						<select name="pare2">
  							<?php while($rows2= mysqli_fetch_assoc($result2)) { ?>
  							<option value=" <?php echo $rows2['idUser']; ?> "> <?php echo $rows2['nameUser']; ?> </option>
  							<?php } ?>
  						</select>
              </div>
  						<!--FIM SELECTS-->

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

<!-- início modal apagar-->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  				<div class="alert-danger"><h4 class="modal-title" id="exampleModalLabel">Apagar</h4></div>
  			</div>
  			<div class="modal-body">
  				<form method="post" action="acts/apagarartigop.php" enctype="multipart/form-data">
  						<label for="recipient-name" class="control-label">Id do texto: </label>
  						<input type="text" name="idtexto" class="form-control" id="idtexto" readonly="true">
  				<div class="modal-footer">
  					<button type="button" class="btn btn-success" data-dismiss="modal">Fechar</button>
  					<button type="submit" class="btn btn-danger">Apagar</button>
  				</div>
  				</form>
  			</div>
  		</div>
  	</div>
  </div>
<!-- fim modal apagar-->

<footer id="adm">
  <ul id="menufooter">
    <li><a href="acts/mudarsenha.php">Mudar Senha</a></li>
    <li><a href="acts/gerenciarPareceristas.php">Gerenciar Pareceristas</a></li>
  </ul>

</footer>
</div>
  <!-- Importando o jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
  <!-- Importando o js do bootstrap -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <script type="text/javascript">
  $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var recipient = button.data('whatever') 
 
  var modal = $(this)
  modal.find('.modal-title').text('Selecione o parecerista para o texto: ' + recipient)
  modal.find('#idtexto').val(recipient)

  })


  $('#exampleModal2').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var recipient = button.data('whatever') 
 
  var modal = $(this)
  modal.find('.modal-title').text('CUIDADO! Ao clicar no botão apagar irá excluir o texto: ' + recipient)
  modal.find('#idtexto').val(recipient)

  })
  </script>
</body>
</html>