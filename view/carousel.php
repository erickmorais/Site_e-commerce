<?php 
include_once'../model/manager.php';
include_once'../model/urls.php';
$fil['id_product']=$_GET['filter'];
$table_content =select_common('carousel',null,$fil,null,null);
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="static/bootstrap/css/bootstrap.css">
  <style type="text/css">
        
        body{background-color:#F5F5F5; }
       
</style>

</head>
<body>
  
  <div class="row banner"> 
    <div class="col-md-8">
      <div class="container">
        <nav class="navbar ">
          <a href="../admin.php?option=carou" class="navbar-brand">
    
          <span class="glyphicon glyphicon-home"></span>
            Area de Adiministração
      
          </a>
          <p class="text-right" style="padding:13px;"></p>
        </nav>
      </div>
    </div>
  </div>
<?php if ($_GET['action'] =='add'):?>
      <div class="container">
          <div class="row">
            <div class="col-md-10">
             
              <form action="../controller/add_carousel.php" method="POST" enctype="multipart/form-data">
                  <div class="panel panel-default">
                    <div class="panel-body">
                      <div class="form-group">
                         <label for="exampleInputPassword1">Adicionar Imagem</label>
                           <input type="file" class="form-control"  name="file" required>
                      </div>
                          <input type="hidden" name="id_product" value="<?php echo $_GET['filter']?>">
                        
                        <button type="submit" class="btn btn-info btn-block">
                          <i class="glyphicon glyphicon-plus"></i>
                          Adicionar Imagem 
                        </button>
                    </div>
                  </div>
              <form/>
            </div>
          </div>
        </div>  
<?php elseif($_GET['action'] =='del'):?>
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="jumbotron"  style="overflow:auto;">

              <?php 
                 $table_titles['img'] = "Imagens ja adicionadas";
                 $filter=  "id";
                 $update = false;
                 $delete =true;
                 $update_destiny = "";
                 $delete_destiny = "../controller/delete_carousel.php";
                      $tam = count($table_content);
      
                  for ($i = 0; $i  < $tam ; $i++) { 
                    $table_content[$i]['img'] ='<img src="../img/'.$table_content[$i]['img'].'"class="img-responsive" width="30%" '; 
                  }
                  if ($table_content != null) {
                    include_once'list_common.html';
                  }
              ?>
            </div>
          </div> 
        </div>   
      </div> 
    </div> 
  </div>
<?php endif?>
<script type="text/javascript" src="static/bootstrap/js/bootstrap.js"></script>




</body>
</html>