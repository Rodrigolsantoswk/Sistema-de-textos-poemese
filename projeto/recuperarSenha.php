<?php
session_start();

if(isset($_SESSION['usuario'])){
    header("location: painel.php");
}


if(isset($_GET['msg'])){
  $msg=$_GET['msg'];
  switch($msg){
    case 1:
    ?>
    <div id="erro" class="alert alert-danger" role="alert">
      <p align="center">Este email não existe, verifique se digitou corretamente</p>
    </div>
    <?php
    break;
    case 2:
    ?>
    <div id="erro" class="alert alert-success" role="alert">
      <p align="center">PROBLEMAS DE COMUNICAÇÃO COM O SERVIDOR!</p>
    </div>
    <?php
    break;
    case 3:
    ?>
    <div id="erro" class="alert alert-success" role="alert">
      <p align="center">Nova senha enviada para o email</p>
    </div>
    <?php
  }
}
?>



<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recuperar Senha</title>
    <link rel="shortcut icon" type="image/png" href="imgs/fav.png"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<style>
img#logo{
    width: 220px;
    float: left;
    margin-right:5px;
}
ul#menu{
    list-style: none;
    margin-top: 10px;
    margin-bottom: -9px;
    word-wrap:break-word;
    white-space: nowrap;
    border-bottom: 1px black;
    display: flex;
    justify-content: center;
    margin-left: -40px;
}

ul#menu li{
    display: inline;
    margin-right: 25px;
    
}

ul#menu li a:hover{
    color: #FF1493;
    text-decoration: none;
    transition: 0.7s;
    background-color: #F5A9E1;
    border-radius: 7px;
}

ul#menu li a{
    color: #DC2260;
    padding: 3px;
}

header{
    margin-bottom: -110px;
    margin-left: 7%;
    font-size: 12pt;
}

body#body{

}
</style>

<script>
  //CONTROLE DE ERROS--TEMPO
    setTimeout(function() {
        $('#erro').fadeOut('linear');
    }, 2000);
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<body id="body">
    <header>
       <br>
       <center>
        <nav>
            <ul id="menu">
                <li><a href="http://revistapoemese.tk/">Revista</a></li>
                <li><a href="index.php">Início</a></li>
                <li><a href="envioartigo.php">Envie seu artigo</a></li>
                <li><a href="paglog.php">Login</a></li>
                <li><a href="solicitar.php">Solicitar cadastro</a></li>
            </ul>
        </nav>
        </center>
    </header>

    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Recupere sua Senha</h3>
                    <h3 class="title has-text-grey">POEME-SE</h3>
                
                    <div class="box">
                        <form action="recsenha.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input name="usuario"class="input is-large" placeholder="Seu email" autofocus="">
                                </div>
                            </div>
                           
                            <button type="submit" class="button is-block is-link is-large is-fullwidth"
                            name="ok"
                            value="ok">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>