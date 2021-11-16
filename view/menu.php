

<?php require_once "dependencias.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/topo.css">
</head>
<body>
  

<div id="nav"  class = "todo">
  
    <div class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="100">
      <div class="container">
      
        <div class="navbar-header cabecalho">
       
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only butao">Toggle navigation</span>
          
            <span>Menu</span>
          </button>
          <a class="navbar-brand " href="inicio.php"><img class="img-responsive logo img-thumbnail foto" src="../img/oscar.png" alt="Logo" ></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse topo">

          <ul class="nav navbar-nav navbar-right lista">

            <li class="iniciar"><a href="inicio.php"><span class="glyphicon glyphicon-home"></span> Home</a>
            </li>

            
          </li>
          <li class="dropdown esconde">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span> Gestão Produtos <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="categorias.php">Categorias</a></li>
              <hr>
              <li><a href="produtos.php">Produtos</a></li>
            </ul>
          </li>


       

<!--================================================================-->
      <!-- li class = "lista2"><a href="clientes.php"><span class="glyphicon glyphicon-user"></span> Pessoas</a -->
      <li class="dropdown esconde">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Pessoas <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="clientes.php">Clientes</a></li>
              <hr>
              <li><a href="fornecedores.php">Fornecedores</a></li>
            </ul>
          </li>
<!--======================================================================================-->
          </li>
      <li  class = "lista2"><a href="#"><span class="glyphicon glyphicon-usd"></span>Vendas</a>
          </li>
          
          <li class="dropdown esconde1">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span> Usuario:<span class="caret"></span></a>
            <ul class="dropdown-menu">
              
            <?php if($_SESSION['usuario'] == 'alberto'): ?>
              <li><a href="usuarios.php"><span class="glyphicon glyphicon-off"></span>Gestao de Usuarios</a></li>
              <?php endif; ?>
              <hr>
              <li><a href="../procedimentos/sair.php"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
            </ul>
          </li>



          <!------>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.contatiner -->
  </div>
</div>
<!-- Main jumbotron for a primary marketing message or call to action -->





<!-- /container -->        
</body>
</html>

<script type="text/javascript">
  $(window).scroll(function() {
    if ($(document).scrollTop() > 150) {
      $('.logo').width(70);
      $('.logo').height(70);

    }
    else {
      $('.logo').height(70);
      $('.logo').width(70);
    }
  }
  );
</script>