<?php


include_once'../model/manager.php';
include_once'../model/urls.php';


$data =$_POST;



var_dump($data);

$result = insert_common("tb_mensage",$data);


echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">

alert ("Mensagem enviada")
</SCRIPT>';

header("location:../index.php");





?>


