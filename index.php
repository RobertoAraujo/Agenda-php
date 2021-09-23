<?php  

session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  header('location:login.php');
}

$logado = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="PT-Br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Agenda Telefônica</title>

  <!-- Bootstrap core CSS -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- CSS PERSONALIZADO -->
  <link href="css/style.css" rel="stylesheet">
  
</head>
<?php
include "config.php";
?>
<body>
  <!-- Static navbar -->
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Agenda - PHP</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="index.php?page=">Início</a></li>
          <li><a href="index.php?page=form_contato">Cadastrar</a></li>
          <li><a href="index.php?page=listar_contatos&contato=">Listar</a></li>
          <li><a href="logout.php?sair=logout">Sair</a></li>
            <!-- <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li> -->
          </ul>
          <ul class="nav navbar-nav navbar-right">

            <form class="navbar-form navbar-left" role="search" name="busca" action="index.php">
              <div class="form-group">
                <input type="hidden" name="page" value="listar_contatos" />          
                <input type="text" name="contato" class="form-control" placeholder="Buscar ">
              </div>
              <button type="submit" class="btn btn-success"><b> Buscar </b></button>
            </form>
          </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <div class="container">

      <!-- Componente principal para uma mensagem de marketing primária ou apelo à ação -->
      <?php 
      $page='';
      if( empty($_REQUEST['page'])){  
        ?>
        <div class="jumbotron">
          <h2><?php echo "Bem vindo(a) ".$logado ?> - Agenda Telefônica!</h2>
          <p> </p>
        </div>
        <?php }else{
          $pagina = $_REQUEST['page'];
          include ($pagina.'.php');
        }
        ?>

      </div> <!-- /container -->

      <?php
      mysqli_close($con);

      ?>
    
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
    </html>
