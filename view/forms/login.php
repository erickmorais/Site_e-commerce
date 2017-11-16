<?php

include_once'../model/manager.php';

  $name = $_POST['user_name'];
  $senha =sha1($_POST['user_password']);

    $filters['name'] = $name;
   
    $user_data = select_common('user',null, $filters,null);
    $user_data = $user_data[0];
   
 
  //Veficando se existe usuario
  
   if ($user_data == null) {
	header("location:../admin.php");

   }elseif($senha != $user_data['senha']){
    header("location:../admin.php");
    }else{
   
   
   session_start();
   $_SESSION['logado'] ="logado";
   header("location:../admin.php");
		 


}






?>