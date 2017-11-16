<?php
  
   include_once dirname(__DIR__).'/controller/connect.php';


function rede($rede_social){
    $tam = strlen( $rede_social)-4;
     $rest = substr($rede_social,0,-$tam); 
     
     return $rest;
   }


function imprimir_rede($social){
     
     $size = count($social);
     
    for ($i=0; $i < $size ; $i++) { 
      $rede =rede($social[$i]['social_link']);
      $link = substr($social[$i]['social_link'],4);
      

      if ( $rede == "face") {
      	echo'<li>
                 <a  href='.$link.' class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name" >Facebook</span>
                 </a>
             </li> ' ;
      }else if($rede == "twit" ){
         echo'<li>
                <a  href="'.$link.'" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name" >Twitter</span>
                </a>
              </li> ' ;
      }else if ($rede == "inst") {
        echo '<li>
                 <a  href="'.$link.'" class="btn btn-default btn-lg"><i class="fa fa-instagram fa-fw"></i> <span class="network-name" >Instagram</span>
                 </a>
              </li> ' ;
      }
    }
}
  

function Tabela_cores(){
 $color ="";
 $cores = array("00", "33", "66", "99", "CC", "FF");

 $color;
       $all_cores = array();
       $x;$y;$z;$k=0;
       $j=0;
       $posi=0;
 $cores = array("00", "33", "66", "99", "CC", "FF");  
  
  // Metodo para gerar todas as cores  
  for ($i=0; $i <= 215 ; $i++) { 
    
        if ($j > 5 ) {
         ++$k;
         $j=0;
        }
        if ($k==6) {
         $k=0;
        }
        if ($posi > 5) {
         $posi =0;
        }
        
    if ($i <36) {
         $x='00';
         $y=$cores[$k]; 
         ++$j;
    }else if($i >=36 && $i <= 71){
         $x='33';
         $y=$cores[$k]; 
         ++$j;
    }else if($i>=72 && $i < 108){
          $y=$cores[$k]; 
          $x='66';
          ++$j;
    }else if($i >=108 && $i < 144){
           $y=$cores[$k]; 
          $x='99';
           ++$j;
    }else if($i >=144 && $i < 180){
           $y=$cores[$k]; 
          $x='CC';
           ++$j;
    }else if($i >=180 && $i < 216){
          $y=$cores[$k]; 
          $x='FF';
           ++$j; 
    }
       $color = $x.$y.$cores[$posi];
       ++$posi;
       
       array_push($all_cores, $color);
  }
   
  
 return $all_cores;
  
}



function gerar_tabela($num,$all_cores,$nc){
   
   //funcao que gera a tebela com todas as cores possiveis
  $type='type=one';
  $nuc=1;
 
  if (isset($_GET['nc'])) {
    
     $nuc=$_GET['nc'];
  }
      
  if (isset($_GET['type']) && $_GET['type']=='degrade') {
        
      $type='type=degrade';
  }
 
 echo '<table class=" table-striped table-inverse" border=""><tr>';
        foreach ($all_cores as $key => $value) {
            echo'<td><td bgcolor="'.$value.'"><a href="?option=color&'.$type.'&cor'.$nc.'='.$value.'&nc='.$nuc.'">'.'&nbsp&nbsp'.'</a></td>';
        }
        echo'<tr/>';
        echo'<table/>';
        echo'<hr/>';
}


function imprimir_cores($num,$all_cores){
    
    /*Funcao que imprimi as tabelas de cores, baseado no numero de cores a serem
      selecioados
    */
   
    $nc=1;
  
    for ($i=0; $i < $num ; $i++) { 
     gerar_tabela($num,$all_cores,$nc);
      ++$nc;
    }
}


function cores_select(){
    
    //Funcao que captura e as cores escolhidas pelo usuario
    

    if(!isset($_SESSION['cor1_ok'])) {
       $_SESSION['cor1']= $cor1='000000';
    }else if (!isset($_SESSION['cor2_ok'])) {
      $_SESSION['cor2']= $cor2='000000';
    }else if (!isset($_SESSION['cor3_ok'])) {
       $_SESSION['cor3']= $cor3='000000';
    }else if (!isset($_SESSION['cor4_ok'])) {
       $_SESSION['cor4']= $cor4='000000'; 
    }
   
    if (isset($_GET['type']) && $_GET['type']=='one') {
      
      if (isset($_GET['cor1'])){
        $_SESSION['cor1'] = $_GET['cor1'];
        $_SESSION['cor2'] = $_GET['cor1'];
        $_SESSION['cor3'] = $_GET['cor1'];
        $_SESSION['cor4'] = $_GET['cor1'];
      } 

    }else if(isset($_GET['type']) && $_GET['type']=='degrade'){
     
      if (isset($_GET['nc']) && $_GET['nc']== 2 ) {
          
          if (isset($_GET['cor1'])) {
            $_SESSION['cor1'] = $_GET['cor1'];
            $_SESSION['cor2'] = $_GET['cor1'];
            $_SESSION['cor1_ok']='ok';
            $_SESSION['cor2_ok']='ok';
          }else if (isset($_GET['cor2'])) {
            $_SESSION['cor3'] = $_GET['cor2'];
            $_SESSION['cor4'] = $_GET['cor2'];
            $_SESSION['cor4_ok']='ok';
            $_SESSION['cor3_ok']='ok';
          }
      }else if(isset($_GET['nc']) && $_GET['nc']== 3){
          
          if (isset($_GET['cor1'])) {
            $_SESSION['cor1'] = $_GET['cor1'];
            $_SESSION['cor1_ok']='ok';
          }else if (isset($_GET['cor2'])) {
            $_SESSION['cor2'] = $_GET['cor2'];
            $_SESSION['cor2_ok']='ok';
          }else if (isset($_GET['cor3'])) {
            $_SESSION['cor3'] = $_GET['cor3'];
            $_SESSION['cor3_ok']='ok';
            $_SESSION['cor4'] = $_GET['cor3'];
            $_SESSION['cor4_ok']='ok';
          }
      }else if(isset($_GET['nc']) && $_GET['nc']== 4){
          if (isset($_GET['cor1'])){
            $_SESSION['cor1'] = $_GET['cor1'];
            $_SESSION['cor1_ok']='ok';
          }else if(isset($_GET['cor2'])){
            $_SESSION['cor2'] = $_GET['cor2']; 
            $_SESSION['cor2_ok']='ok';
          }else if (isset($_GET['cor3'])){
            $_SESSION['cor3'] = $_GET['cor3']; 
            $_SESSION['cor3_ok']='ok';
          }else if (isset($_GET['cor4'])){
            $_SESSION['cor4'] = $_GET['cor4']; 
            $_SESSION['cor4_ok']='ok';
          } 
      }
}
    
    if (isset($_SESSION['cor1']) && isset($_SESSION['cor2']) && isset($_SESSION['cor3']) && isset($_SESSION['cor4']) ) {
      $select = '#'.$_SESSION['cor1'].','.'#'. $_SESSION['cor2'].','.'#'.$_SESSION['cor3'].','.'#'.$_SESSION['cor4'];
      return $select;
     } 
        
    
   
}

function number_color(){
    
    //Ver que tipo de cor o usuario escolheu se foi apenas uma ou degrade

    $type='null';

    if (isset($_GET['type']) && $_GET['type']=='one' ) {
           $type=1;
    }else if(isset($_GET['type']) && $_GET['type']=='degrade'){
       if (isset($_GET['nc'])) {
           $type=$_GET['nc'];
       }  
     }

   return $type;
}


function color_number(){
  
  //Imprimi os butoes se o usuario escolheu degrade como tipo de cor 
 
  echo'<hr/>';
  if (isset($_GET['type']) && $_GET['type']=='degrade') {
     
     $url='?option=color&type=degrade&';

    echo'
    <a href="'.$url.'nc=2"><button  class="btn btn-primary btn-sm">2 cores</button><a/>
    <a href="'.$url.'nc=3"><button  class="btn btn-primary btn-sm">3 cores</button><a/>
    <a href="'.$url.'nc=4"><button  class="btn btn-primary btn-sm">4 cores</button><a/>';
  }
   echo'<hr/>';  
  

}


 function cor(){
  
  //Pega todas cores selecionas 

  $c1;$c2; $c3; $c4; $co;
  
  $field['config_cor']='config_cor';

  $result =select_common('tb_config',$field,null,null);
 

  $result =$result[1];
    
     foreach ($result as $key => $value) {
        $co=$value;
     }
  $cores = explode("-",$co);
  
  for ($i=0; $i <=3; $i++){ 
      if ($i == 0) {
        $c1 = $cores[$i];
      }
      if ($i == 1) {
        $c2 = $cores[$i];
      }
      if ($i == 2) {
        $c3 = $cores[$i];
      }
      if ($i == 3) {
        $c4 = $cores[$i];
      }
  }
   
   //imprime todas as cores  
   echo $cores_select ='#'.$c1.','.'#'.$c2.','.'#'.$c3.','.'#'.$c4;
 
   
  
}
?>