<?php
//nome do site, se utilizar algum nome ex: "localhost" ou algum DNS personalizado insita também o http://
$site = '127.0.0.1/agenda-php-mysql/';

//nome do banco de dados
$nome_banco = "agendaaps";

$con = mysqli_connect("127.0.0.1","root","",$nome_banco);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

mysqli_select_db($con,$nome_banco);

?>

