<?php

function cat_product($cat,$products){
  $cont =count($products);
 for ($i=0; $i <$cont; $i++) { 
    if ($products[$i]['product_cat'] == $cat) {
        echo '  <div class="col-md-6">
                    <div class="thumbnail" style="word-wrap: break-word;">
                     <a href="?product_view='.$i.'&id_pro='.$products[$i]['id'].'&#product" >    
                     <img src="img/'.$products[$i]['imagem'].'" width="70%" >
                        <div class="caption">
                          <h3>'.$products[$i]['product_name'].'</h3>
                            <hr/>
                          <h4>'.'R$'.$products[$i]['product_price'].'</h4>
                        </div> 
                    <a/>
                    </div> 
                </div>'; 
    }
 }

} 

function carousel(){
  $fielter['id_product']=$_GET['id_pro'];
  
  $car= select_common('carousel',null,$fielter,null);
  $cont =count($car);



  for ($i=0; $i <$cont ; $i++) { 
    if ($i == 0) {
      echo' <div class="item active">
                       <img src="img/'.$car[$i]['img'].'"/>
           </div>';
    }else{
     echo' <div class="item">
                       <img src="img/'.$car[$i]['img'].'"/>
           </div>';
    
    }
   } 
 
 
 
}

function mostrar_carou(){
$fielter['id_product']=$_GET['id_pro'];
$car= select_common('carousel',null,$fielter,null);

return $car;
  
}

?>