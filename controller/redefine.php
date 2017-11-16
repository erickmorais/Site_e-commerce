<?php
include_once'../model/manager.php';

$fields['senha']="senha";
$filter['id_user']=1;


$s = select_common('user', $fields,$filter,null);
$s =$s[0];

$senha = $s['senha'];


$senha_digitada = sha1($_POST['senha_atual']);
 
session_start();

if(!isset($_SESSION["status"])){

if ($senha_digitada == $senha  ) {
$_SESSION["status"] ="senha_ok";

header("location:../admin.php?option=password");
}else{

	$_SESSION["status"] ="senha_error";
    header("location:../admin.php?option=password");

}

}else{

$filter['id_user']=1;
$data['senha'] =$senha_digitada; 
$result = update_common("user", $data, $filter, null);
unset( $_SESSION['status'] ); 

header("location:../admin.php");
}




?>