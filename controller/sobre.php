<?php
include_once'../model/manager.php';
include_once'../model/urls.php';


$data =$_POST;


var_dump($data);

$filter['id']='1';
 
 $result = update_common('tb_about', $data, $filter, null);


session_start();

$_SESSION['all_ok']='ok';
header("location:../admin.php?option=about");


?>