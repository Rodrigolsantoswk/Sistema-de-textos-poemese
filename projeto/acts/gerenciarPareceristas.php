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

if(strcmp($_Mail, "parecerista")==0){
	session_destroy();
	header("location: paglog.php?msg=4");
}

if (isset($_GET['deslogar'])){
	session_destroy();
	header("location: ../index.html");
}

$query2= "select *from user where Level='parecerista'";

$result2= mysqli_query($conexao, $query2) or die (mysqli_error());


//CONTROLE DE ERROS
if(isset($_GET['msg'])){
    $msg=$_GET['msg'];
    switch($msg){
        case 1:
        ?>
        <div id="erro" class="alert alert-success" role="alert">
            <p align="center">Parecerista Apagado</p>
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
        <li><a href="../administrador.php">Textos Pendentes</a></li>
        <li><a href="../solicitacoesadm.php">Solicitações</a></li>
        <li><a href="../textap.php">Textos Aprovados</a></li>
        <li><a href="../textrp.php">Textos Reprovados</a></li>
        <li><a href="../textba.php">Textos Balanceados</a></li>
        <li><a href="../recotxt.php">Recolher textos</a></li>
      </ul>
    </nav>
  </header>
  <div class="container theme-showcase" role="manin">
		<div class="page-header">
			<h1 align="center">Lista de Pareceristas </h1>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thread>
						<tr>
							<th>#</th>
							<th>Titulo</th>
							<th>Status</th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th>Visualizar</th>
						</tr>
					</thread>
					<tbody>
					<?php while($rows= mysqli_fetch_assoc($result2)) { ?>
					<tr>
					<td><?php echo $rows['idUser']; ?></td>
					<td><?php echo $rows['nameUser']; ?></td>
					<td><?php echo $rows['Email']; ?></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>

					<button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#exampleModal2" data-whatever="<?php echo $rows['idUser']; ?>">Apagar</button>

					</td>
					</tr>

							<?php } ?>
						</tbody>
					</table>	
				</div>
			</div>
		</div>


<!-- início modal apagar-->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<div class="alert-danger"><h4 class="modal-title" id="exampleModalLabel">Apagar</h4></div>
			</div>
			<div class="modal-body">
				<form method="post" action="apagarParecerista.php" enctype="multipart/form-data">
					<label for="recipient-name" class="control-label">Id do usuário: </label>
					<input type="text" name="iduser" class="form-control" id="iduser" readonly="true">
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
    <li><a href="mudarsenha.php">Mudar Senha</a></li>
    <li><a href="gerenciarPareceristas.php">Gerenciar Pareceristas</a></li>
  </ul>

</footer>

 <!-- Importando o jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
  <!-- Importando o js do bootstrap -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript">

$('#exampleModal2').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var recipient = button.data('whatever') 
 
  var modal = $(this)
  modal.find('.modal-title').text('CUIDADO! Ao clicar no botão apagar irá excluir o parecerista: ' + recipient)
  modal.find('#iduser').val(recipient)

})

</script>



</body>
</html>