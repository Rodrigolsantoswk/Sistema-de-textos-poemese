    <?php 
if(isset($_GET['msg'])){
    $msg=$_GET['msg'];
    switch($msg){
        case 1:
        ?>
        <div id="erro" class="alert alert-danger" role="alert">
            <p align="center">Preencha todos os campos. Tente novamente.</p>
        </div>
        <?php
        break;
        case 2:
        ?>
        <div id="erro" class="alert alert-danger" role="alert">
            <p align="center">Usuário já existe, tente outro email.</p>
        </div>
        <?php
        break;
        case 3:
        ?>
        <div id="erro" class="alert alert-danger" role="alert">
            <p align="center">Solicitação já foi enviada, tente outro email.</p>
        </div>
        <?php
        break;
        case 4:
        ?>
        <div id="erro" class="alert alert-success" role="alert">
            <p align="center">Solicitação enviada.</p>
        </div>
        <?php
        break;
    }
}
?>


<!doctype html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Rodrigo Lima">
    <link rel="shortcut icon" type="image/png" href="imgs/fav.png"/>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Solicite seu cadastro</title>
</head>
<style>
h1{
    font-family: constantia;
    font-size: 16pt;
}
img#logo{
    

}
.content{
    margin-left: 5%;
    position: absolute;
    width: 90%;
    height: 100%;
}
.body{
     background-image: url(imgs/library.png);
}
form#formartigo{
    margin-left:10px;
}
</style>

<script>
  //CONTROLE DE ERROS--TEMPO
    setTimeout(function() {
        $('#erro').fadeOut('linear');
    }, 2000);
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<body class="body">

    <div class= "content">
        <header id="off">
            <img src="imgs/logo.png" alt="Poeme-se logo" id="logo">
            <nav id="index">
                <br>
                <hr color="black" width="78%" align="right">
                <center>
                    <ul id="menu">
                        <li><a href="http://revistapoemese.ml/">Revista</a></li>
                        <li><a href="index.html">Início</a></li>
                        <li><a href="envioartigo.php">Envie seu artigo</a></li>
                        <li><a href="paglog.php">Login</a></li>
                        <li><a href="solicitar.php">Solicitar cadastro</a></li>
                    </ul>
                </center>
            </nav>
            <hr color="black" width="75%" align="right">
        </header>
        <section>
            <div class="container-fluid" id="content-solic">
                <h1 align="center">Solcicite seu cadastramento para se tornar um parecerista e contribuir com a equipe</h1>
            </div>
            <div style="display:flex; justify-content: center; margin-top:10px; margin-bottom:-10px">
            <p class="alert-danger" style="width: 700px; border-radius:10px;" align="center">É necessário que tenha comunicado a revista antes através do formulário disponível <a href="http://revistapoemese.wixsite.com/poeme-se/contato"  style="color: #2E64FE;">AQUI</a> para que tenha mais chances de ser aceito.</p></div>
            <hr color="black" width="100%">
            <form action="solicitacao.php" id="formartigo" name="formsolicitacao" method="post">
              <p align="center">Nome completo:</p>
              <div class="justify">
                <input type="text" name="nome" placeholder="Digite seu nome">
              </div>
              <br><br>
              <p align="center">Email:</p>
              <div class="justify">
                <input type="email" name="email" placeholder="Digite seu email">
              </div>
              <br><br>
              <p align="center">Senha:</p>
              <div class="justify">
                <input type="password" name="senha" placeholder="********">
              </div>
              <br><br>
              <button type="submit" id="btn" class="btn btn-primary" name="submit" value="enviar">Enviar</button>
          </form>
      </section>
      <footer id="conteudo">
            <p align="center">Todos os direitos reservados © 
Revista Poeme-se, 2018</p>
        </footer>
  </div>


</body>
</html>