<?php
//conecta ao banco de dados
include "../config.php";
// session_start inicia a sessão
session_start();

// as variáveis login e senha recebem os dados digitados na página anterior
$login = $_POST['login'];
$senha = md5($_POST['senha']);

// A vriavel $result pega as varias $login e $senha, faz uma pesquisa na tabela de usuarios
$query = "select * from $nome_banco.usuarios where login = '".$login."' and senha = '".$senha."'";

$result = mysqli_query($con, $query);

//echo "numero de Linhas: ".mysqli_num_rows($result);
if(mysqli_num_rows($result) > 0)
{
  $_SESSION['login'] = $login;
  $_SESSION['senha'] = $senha;
  header('location:http://'.$site.'index.php');
}
else
{
	echo "<script>alert('Login ou Senha inválido(a), tente novamente.');</script>";
  unset ($_SESSION['login']);
  unset ($_SESSION['senha']);
  echo $login;
  echo $senha;
  header('location:http://'.$site.'login.php?erro=1');
  
}

?>
