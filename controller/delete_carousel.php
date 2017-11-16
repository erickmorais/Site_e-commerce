<?php
include_once '../model/manager.php';

	$filter = $_POST['filter'];
    
    $filte['id'] = $filter;
	
	$imagem = select_common('carousel',null,$filte,null);
    $imagem=$imagem[0];
	$img = $imagem['img'];
	
	unlink("../img/$img");
	$delete = delete_common("carousel",$filte,null);
    
   
    header("location:../admin.php?option=carou" );



?>