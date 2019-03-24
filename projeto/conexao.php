<?php
define('HOST', '127.0.0.1');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'projeto');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('ERRO AO CONECTAR');

?>