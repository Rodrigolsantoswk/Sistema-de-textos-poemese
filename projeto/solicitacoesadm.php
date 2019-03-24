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

$query= "SELECT * FROM `solicitacoes`";
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
        <div id="erro" class="alert alert-success" role="alert">
            <p align="center">Parecerista cadastrado!</p>
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
			<h1 align="center">Lista de solicitações para parecerista</h1>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thread>
						<tr>
							<th>#</th>
							<th>Nome</th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
							<th>Email</th>
							<th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
							<th>Opções</th>
						</tr>
					</thread>
					<tbody>
					<?php while($rows= mysqli_fetch_assoc($result)) { ?>
					<tr>
					<td><?php echo $rows['idSoli']; ?></td>
					<td><?php echo $rows['nameSoli']; ?></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
					<td><?php echo $rows['mail']; ?></td>
					<td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
					<td>
					<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $rows['idSoli']; ?>" data-whatevernome="<?php echo $rows['nameSoli']; ?>" data-whatevermail="<?php echo $rows['mail']; ?>" data-whateverpass="<?php echo $rows['PassSoli']; ?>">Cadastrar</button>

					<button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#exampleModal2" data-whatever="<?php echo $rows['idSoli']; ?>">Apagar</button>

					</td>
					</tr>

					<?php } ?>
				</tbody>
		    </table>	
		</div>
	</div>
</div>

<!-- início modal cadastrar-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  				<h4 class="modal-title" id="exampleModalLabel">New message</h4>
  			</div>
  			<div class="modal-body">
  				<form method="post" action="acts/accsoli.php" enctype="multipart/form-data">
  						<label for="recipient-name" class="control-label">Id da solicitação: </label>
  						<input type="text" name="idSoli" class="form-control" id="idSoli" readonly="true">
  						<label for="recipient-name" class="control-label">Nome do solicitante: </label>
  						<input type="text" name="nomeSoli" class="form-control" id="nomeSoli" readonly="true">
  						<label for="recipient-name" class="control-label">Email do solicitante: </label>
  						<input type="text" name="mailSoli" class="form-control" id="mailSoli" readonly="true">
  						<input type="hidden" name="passSoli" class="form-control" id="passSoli" readonly="true">
  					</div>
  					<div class="modal-footer">
  						<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
  						<button type="submit" class="btn btn-success">Cadastrar</button>
  					</div>
  				</form>
  			</div>
  		</div>
  	</div>
</div>
<!-- fim modal cadastrar-->

<!-- início modal apagar-->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  				<div class="alert-danger"><h4 class="modal-title" id="exampleModalLabel">Apagar</h4></div>
  			</div>
  			<div class="modal-body">
  				<form method="post" action="acts/apagarsoli.php" enctype="multipart/form-data">
  						<label for="recipient-name" class="control-label">Id da solicitação: </label>
  						<input type="text" name="idSoli" class="form-control" id="idSoli" readonly="true">
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

 <!-- Importando o jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
  <!-- Importando o js do bootstrap -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <script type="text/javascript">
  $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var recipient = button.data('whatever') 
  var recipientnome = button.data('whatevernome') 
  var recipientmail = button.data('whatevermail') 
  var recipientpass = button.data('whateverpass') 

  var modal = $(this)  
  modal.find('.modal-title').text('Cadastrar parecerista: ' + recipient)
  modal.find('#idSoli').val(recipient)
  modal.find('#nomeSoli').val(recipientnome)
  modal.find('#mailSoli').val(recipientmail)
  modal.find('#passSoli').val(recipientpass)

  })


  $('#exampleModal2').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var recipient = button.data('whatever') 
 
  var modal = $(this)
  modal.find('.modal-title').text('CUIDADO! Ao clicar no botão apagar irá excluir a solicitação: ' + recipient)
  modal.find('#idSoli').val(recipient)

  })
  </script>
</body>
</html>