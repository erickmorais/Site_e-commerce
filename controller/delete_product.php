<?php
	
include_once '../model/manager.php';

$filter = $_POST['filter'];
    
$filte['id'] = $filter;
	
$filde['imagem']='imagem';

$filte_car['id_product'] = $filter;


$imagem = select_common('tb_product',$filde,$filte,null);
   
$imagem = $imagem['0'];

$img = $imagem['imagem'] ;
   
unlink("../img/$img");

//-------------------------------------------------------
$delete_product = delete_common("tb_product",$filte,null);
//-------------------------------------------------------

$filter_car['id_product']= $filter;
$carousel = select_common('carousel',null,$filter_car,null);
$cont =count($carousel);

if ($cont > 1) {
	for ($i=0; $i <$cont ; $i++) { 
		$img_car=$carousel[$i]['img'];
		unlink("../img/$img_car");  
	}
}else{$img_car=$carousel[0]['img'];unlink("../img/$img_car");}

 
$delete_carousel = delete_common("carousel",$filte_car,null);

header("location:../admin.php?option=list_products");

?>
