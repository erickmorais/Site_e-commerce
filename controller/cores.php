<?php
 include_once'../model/manager.php';
 include_once'../model/urls.php'; 

  session_start();
  $cor1;
  $cor2;
  $cor3;
  $cor4;

  if (isset($_SESSION['cor1'])) {
  $cor1 =$_SESSION['cor1'];
  }
  if (isset($_SESSION['cor2'])) {
  $cor2 ='-'.$_SESSION['cor2'];
  
  }
  if (isset($_SESSION['cor3'])) {
  $cor3 ='-'.$_SESSION['cor3'];
  
  }
  if (isset($_SESSION['cor4'])) {
  $cor4 ='-'.$_SESSION['cor4'];
  	
  }
  
  $cores =$cor1.$cor2.$cor3.$cor4;
  

 
  $data['config_cor']=$cores;
  $filter['id']=5; 

  $result = update_common('tb_config', $data, $filter, null);
  
  $_SESSION['all_ok']='ok';


  header("location:../admin.php?option=color");

