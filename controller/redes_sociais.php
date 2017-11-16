<?php

include_once'../model/manager.php';


$data =$_POST;

var_dump($data);

$data['social_link']= $data['rede'].$data['social_link']; 

unset($data['rede']);

insert_common('tb_social',$data);

session_start();

$_SESSION['social_all_ok']='ok';

header("location:../admin.php?option=sociais")

?>