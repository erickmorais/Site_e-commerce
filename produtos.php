<?php  

include_once'model/urls.php';
include'model/includes/head.php';
include'model/meu_manager2.php';
$cats = select_common('tb_cat',null,null,null); 

?>


<!DOCTYPE html>
<html>
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

<style type="text/css">
    a:link{text-decoration:none; color:white; }
    a:hover{ text-decoration:none; color:white;}
</style>


       <title><?php echo $config['config_nome']?></title>
</head>
<body>



 <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation" style="background-color:#FFFFF0;">
        <div class="container topnav" >
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" >
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <a class="navbar-brand topnav" href="index.php"><?php echo $config['config_nome']?></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
           
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

<?php if(isset($_GET['product_view'])):
$p=$_GET['product_view'];
?>
<a  name="product"></a>
      <div class="content-section-a">
        <div class="container">
          <div class="row">
            <div class="panel panel-default">
              <div class="panel-body">
              </div> 
            </div>
          </div>      
        </div>
      </div>         
  <div class="container">
                  <div class="col-md-5">
                    <div class="thumbnail" style="word-wrap: break-word; ">
                     <img src="img/<?php echo $product[$p]['imagem'];?>" width="80%"/>
                        <div class="caption">
                          <h3><?php echo  $product[$p]['product_name'];?></h3>
                          <h5><?php echo  $product[$p]['product_desc'];?></h5>
                          <hr/>
                          <h4><?php echo 'R$'.$product[$p]['product_price'];?></h4>
                        </div> 
                    </div> 
                  </div> 
    <?php 
     if (mostrar_carou() != null):
    ?>
          <div class="col-md-6" >
            <div id="carousel-example-generic" class="carousel slide" >
              <div class="carousel-inner" role="listbox">
               <?php carousel();?>
              </div>
             
             <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
               <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
               <span class="sr-only">Previous</span>
              </a>
              
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
               <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
               <span class="sr-only">Next</span>
              </a>
            </div>
          </div>   
    <?php endif ?>  
  </div>   

 
             



<?php endif ?> 


<a  name="services"></a>
    <div class="content-section-a">
       <div class="container">
          <div class="row">
            <div class="panel panel-default">
              <div class="panel-body">
                 <h4>Pesquisar por</h4>
                <form action="produtos.php#services" method="POST">
                  <select   name="product_cat">
                    <option selected disabled> 
                     -- Selecione Uma Categoria --  
                    </option>
                     <?php
                       foreach ($cats as $value) {
                        echo '<option value="',$value['cat_id'],'">',$value['cat_name'],"</option>";
                       }
                     ?>
                  </select>
                 &nbsp; 
                 <button type="input" name="Select_cat" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-search"></span></button>
                </form>
              </div> 
            </div>
          </div>      
        </div>
       
    </div>

  <div class="container">
    <?php
       if (isset($_POST['product_cat'])) {
           cat_product($_POST['product_cat'],$product);
       }else{
          if ($product != null) {
            for ($i=0; $i <$cont_pro ; $i++) { 
    ?>
                <div class="col-md-6">
                  <div class="thumbnail" style="word-wrap: break-word;">
                    <a href="?product_view=<?php echo $i.'&id_pro='.$product[$i]['id'];?>&#product" >  
                      <img src="img/<?php echo $product[$i]['imagem'];?>"   width="70%"  />
                        <div class="caption">
                          <h3><?php echo  $product[$i]['product_name'];?></h3>
                          <hr/>
                          
                          <h4><?php echo 'R$'.$product[$i]['product_price'];?></h4>
                        </div> 
                    </a>
                  </div> 
                </div>
    <?php     
            }
          }
        }
    ?>             
 
</div>
  <div class="banner" style="background-image: linear-gradient(to right,<?php cor();?>">
  </div>
    
  <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <p class="copyright text-muted small">Copyright &copy; <?php echo $config['config_nome']; $date =date('Y'); echo$date ;?>. Todos Direitos Reservados</p>
          </div>
        </div>
      </div>
    </footer>
    





<script src="view/static/js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="view/static/js/bootstrap.min.js"></script>






</body>
</html>



