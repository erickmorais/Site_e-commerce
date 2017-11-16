<?php
include_once'controller/validate.php';
include'model/includes/head.php';

validate_option();

$about = select_common("tb_about",null,null,null);
$about = $about[0];

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $config['config_nome']?></title>
     
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> 
    <!-- Bootstrap Core CSS -->
    <link href="view/static/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="view/static/css/my-style.css"> 
    <!-- Custom Fonts -->
    <link href="view/static/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  
</head>
<body>

    <!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation" style="background-color:#FFFFF0;">
    <div class="container topnav" >
      <div class="navbar-header" >
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
          <a class="navbar-brand topnav" href="#"><?php echo $config['config_nome']?></a>
      </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li>
               <a href="#sobre">Sobre</a>
              </li>
              <li>
               <a href="#services">Produtos</a>
              </li>
              <li>
               <a href="#contact">Contato</a>
              </li>
            </ul>
        </div>
            <!-- /.navbar-collapse -->
    </div>
        <!-- /.container -->
</nav>


  <!-- Header -->
<a name="about"></a>
  <div class="intro-up" style="background-image: linear-gradient(to right,<?php cor();?>">
        <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="intro-message">
                   <h1><?php echo $config['config_nome']?></h1>
                      <?php
                       //Mostra as redes Sociais
                        if ($social == null) {
                        }else{
                      ?>  
                          <h3>Redes sociais</h3>
                          <hr class="intro-divider">
                          <ul class="list-inline intro-social-buttons">
                      <?php  
                        $Rede_sociais= imprimir_rede($social);
                        }
                      ?>  
                          </ul>
                      
                      
                </div>
              </div>
            </div>
        </div>
  </div>

<a  name="services"></a>
  <div class="content-section-a">
    <div class="container">
      <div class="row">
        
        <div class="panel panel-default">
          <div class="panel-body">
                Produtos
            </div> 
              </div>
               
                <div class="col-lg-5 col-sm-6">
                  <div class="clearfix"></div>
                    <h2 class="section-heading"> <br></h2>
                  </div>
                    <a href="?option=list_produc&#services">
                      <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                        <div class="thumbnail">
                          <img   src="img/<?php echo $product['0']['imagem'];?>" class="img-responsive"   >
                        </div> 
                    </a>
                      </div>  
                </div><br/>   
      </div>
    </div>
  </div>
    <!-- /.content-section-a -->
<a  name="sobre"></a>
  <div class="content-section-a">
      <div class="container">
        <div class="row">
          <div class="panel panel-default">
            <div class="panel-body">
                Sobre
            </div> 
          </div>
          
            <div class="thumbnail">
              <div class="jumbotron" style="overflow:auto;">
                <?php    
                 echo '<p align="Center">'.$about['about_texto'].'</p>';
                 ?>
              </div>
          </div><br/><br/>
        </div>
      </div>
  </div>


  <div class="panel panel-default">
      <div class="panel-body">
        Contatos
      </div> 
  </div>
<a  name="contact"></a>
  <div class="banner" id="banner" style="background-image: linear-gradient(to right,<?php cor();?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                  <?php 
                    if ($cont != 0) {
                     echo '<h2>Contatos</h2>';
                    }
                  ?>
                </div>
                  <div class="col-lg-6">
                    <div id="contatos">
                      <ul class="list-inline  banner-social-buttons">
                        <?php
                            for ($i=0; $i <$cont ; $i++) { 
                               if ($contact[$i]['tele'] =='-') {
                               }else{
                                echo' 
                                <li>
                                <h4>'.$contact[$i]['tele'].'<h4>
                                </li>';
                               }
                            }
                            for ($i=0; $i <$cont ; $i++) { 
                               if ($contact[$i]['email'] =='-') {
                               }else{
                                echo' 
                                <li>
                                <h4>'.$contact[$i]['email'].'<h4>
                                </li>';
                               }
                            }
                        ?>
                      </ul>   
                    </div>
                   
                  </div>
            </div> 
                  <?php include'view/forms/contato_mensagem.html';?>
        </div>
        <!-- /.container -->
  </div>
    <!-- /.banner -->

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                  <p class="copyright text-muted small">
                    Copyright &copy; <?php echo $config['config_nome'];$date =date('Y'); echo$date ;?>. Todos Direitos Reservados
                  </p>
                </div>
            </div>
        </div>
    </footer>





    <!-- jQuery -->
    <script src="view/static/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="view/static/js/bootstrap.min.js"></script>
   
   <script src="view/static/mdl/material.min.js"></script>
    

</body>

</html>
