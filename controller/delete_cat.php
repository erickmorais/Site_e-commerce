<?php
include_once '../model/manager.php';

	$filter = $_POST['filter'];
    
    $filte['cat_name'] = $filter;
	
	$delete = delete_common("tb_cat",$filte,null);

  header("location:../admin.php?option=make_cat" );

?>