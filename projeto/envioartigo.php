<?php 
if(isset($_GET['msg'])){
  $msg=$_GET['msg'];
  switch($msg){
    case 1:
    ?>
    <div id="erro" class="alert alert-danger" role="alert">
      <p align="center">Os campos não foram preenchidos. Preencha todos os campos para enviar o seu artigo.</p>
    </div>
    <?php
    break;
    case 2:
    ?>
    <div id="erro" class="alert alert-success" role="alert">
      <p align="center">Artigo enviado com sucesso!</p>
    </div>
    <?php
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link href="editor.css" rel="stylesheet">
  <title>Envio de artigo</title>
</head>

<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
<script type="text/javascript">
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() }); // convert all text areas to rich text editor on that page

        bkLib.onDomLoaded(function() {
         new nicEditor().panelInstance('area1');
        }); // convert text area with id area1 to rich text editor.

        bkLib.onDomLoaded(function() {
         new nicEditor({fullPanel : true}).panelInstance('area2');
        }); // convert text area with id area2 to rich text editor with full panel.
      </script>

      <script type="text/javascript" src="nicEdit-latest.js"></script>
      <script type="text/javascript">
//<![CDATA[
bkLib.onDomLoaded(function() {
  new nicEditor({maxHeight : 200}).panelInstance('area');
  new nicEditor({fullPanel : true,maxHeight : 200}).panelInstance('area1');
});
  //]]>
</script>

<style>
.body{
     background-image: url(imgs/library.png);
}
nav#index{
  font-size: 12pt;
  margin-top: 0px;
}
img#logo{ 
  margin-top:0px;
}
header{
  margin-top:0px;
  padding-top:0px;
  margin-bottom: -3px;
}
form#formartigo textarea{
  width: 85% ;
}

div#sample{
  margin-left: 15%;
}
section#send{
  margin-top:-2px;
}
.space{
  margin-top:-2px;
  height: 4px;
}
.spaceb{
  height: 2px;
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
  <div id="content">
    <header id="off">
      <img src="imgs/logo.png" alt="Poeme-se logo" id="logo">
      <nav id="index">
        <br>
        <div class="space"></div>
        <hr color="black" width="78%" align="right">
        <div class="space"></div>
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
      <div class="spaceb"></div>
      <hr color="black" width="75%" align="right">
    </header>

    <section id="send">       
      <form action="enviarartigo.php" id="formartigo" name="formartigo" method="POST">
        <h3 align="center">Título do Artigo</h3>
        <div class="justify">
          <input type="text" name="titulo" placeholder="Título do artigo" maxlength="50" autofocus="">
        </div>
        <br><br>
        <h3 align="center">Texto</h3>
        
        <div id="sample">
          <textarea id="artigo" name="artigo" placeholder="Conteúdo" autofocus="" Cols="120" rows="20"></textarea>
        </div>

        <br><br>
        <h3 align="center">Seu nome</h3> 
        <div class="justify">
          <input type="text" name="autor" placeholder="Seu nome" autofocus="" maxlength="60">
        </div>
        <br>
        <h3 align="center">Seu email</h3>
        <div class="justify">
          <input type="email" name="email"  placeholder="Seu email" autofocus="" maxlength="60">
        </div>
        <br><br>
        <button type="submit" id="btn" class="btn btn-primary" name="submit" value="enviar">Enviar</button>
      </form>
    </section>

    <footer id="conteudo">
      <p align="center" style="text-weight: normal">Todos os direitos reservados © 
Revista Poeme-se, 2018</p>
    </footer>
  </div>

</body>

</html>